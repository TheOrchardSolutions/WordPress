<?php
//Load WordPress
$wp_root = explode("wp-content", $_SERVER["SCRIPT_FILENAME"]);
$wp_root = $wp_root[0];
if ($wp_root == $_SERVER["SCRIPT_FILENAME"]) {
    $wp_root = explode("index.php", $_SERVER["SCRIPT_FILENAME"]);
    $wp_root = $wp_root[0];
}
chdir($wp_root);
if (!function_exists("add_action"))
    require_once(file_exists("wp-load.php") ? "wp-load.php" : "wp-config.php");

require_once(dirname(__FILE__) . '/lib/class/seating_chart.class.php');

if (isset($_REQUEST['seating_chart_action'])) {
    switch ($_REQUEST['seating_chart_action']) {
        case 'get_event_seating_chart':
            output_event_seating_chart();
            break;
        case 'book_a_seat':
            book_a_seat();
            break;
        case 'resize_layout_image':
            
            eventespresso_resize_seating_chart_image();
            break;
    }
}
exit();

function book_a_seat() {
    $result = -100;
    if (isset($_REQUEST['event_id']) && isset($_REQUEST['seat_id']) && isset($_REQUEST['booking_id'])) {
        $event_id = $_REQUEST['event_id'];
        $seat_id = $_REQUEST['seat_id'];
        $booking_id = $_REQUEST['booking_id'];
        seating_chart::release_a_seat($booking_id);
        $check = seating_chart::check_seat_available($event_id, $seat_id);
        if ($check == 0) {
            $booking_id = seating_chart::book_a_seat($event_id, $seat_id);
            $result = $booking_id;
        } else {
            $result = -1;
        }
    }
    echo $result;
}

function output_event_seating_chart() {
    global $wpdb;
    $seating_chart_event = NULL;
    seating_chart::clear_booking();
    if ((isset($_REQUEST['event_id']) && is_numeric($_REQUEST['event_id'])) || (isset($_REQUEST['seating_chart_id']) && is_numeric($_REQUEST['seating_chart_id']))) {
        $event_id = (isset($_REQUEST['event_id']) && is_numeric($_REQUEST['event_id']))?$_REQUEST['event_id']:0;
        $seating_chart_id = (isset($_REQUEST['seating_chart_id']) && is_numeric($_REQUEST['seating_chart_id']))?$_REQUEST['seating_chart_id']:0;
        if ( $event_id > 0 ) {
            $seating_chart_event = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where event_id = $event_id ");
            $seating_chart_id = $seating_chart_event->seating_chart_id;
        } 
        if ( $seating_chart_id > 0 ) {
            
            $venue = NULL;
            if ( $event_id > 0 ) {
                $venue = $wpdb->get_results("select v.* from ".EVENTS_VENUE_TABLE."  v inner join ".EVENTS_VENUE_REL_TABLE." vr on v.id = vr.venue_id where vr.event_id = $event_id ");
            }
            echo "<h2>".((is_array($venue)&&count($venue)>0)?$venue[0]->name:__('Choose a Seat', 'event_espresso'))."</h2>";
            echo "<div id='ee_s_layout'>";
            #$seating_chart_id = $seating_chart_event->seating_chart_id;
            $levels = seating_chart::get_level_list($seating_chart_id);
            $sections_ar = seating_chart::get_section_ar_list($seating_chart_id);
			
            $rows_ar = seating_chart::get_row_ar_list($seating_chart_id);
            $seats_ar = array();
            $seats_ar['asc'] = seating_chart::get_seat_ar_list($seating_chart_id, 'asc');
            $seats_ar['desc'] = seating_chart::get_seat_ar_list($seating_chart_id, 'desc');
            foreach ($levels as $level) {
                ?>

                <div id="ee_s_level_<?php echo str_replace(" ", "_", $level->level) ?>" class="ee_s_level">
                    <h4 class="level_head"><strong><?php _e('Level:', 'event_espresso'); ?></strong> <?php echo $level->level; ?></h4>
                    <div class="ee_s_clear">&nbsp;</div>
                <?php
                $sections = isset($sections_ar[$level->level])?$sections_ar[$level->level]: array();
				//echo "<pre>".print_r($sections,true)."</pre>";
                foreach ($sections as $section) {
					$alignment = seating_chart::get_section_alignment($seating_chart_id, $level->level, $section->section);
					
					$section->section_title = __('Section:', 'event_espresso');
					$section->section_name = $section->section;
                    ?>
                        <div id="ee_s_section_<?php echo str_replace(" ", "_", $section->section); ?>" class="ee_s_section" style="float:<?php echo $alignment; ?>;">
                            <h5 class="section_head" style="min-width:<?php echo strlen($section->section)*8; ?>px;"><strong><?php echo $section->section_title; ?></strong> <?php echo $section->section_name; ?></h5>
                    <?php
                    $rows =  isset($rows_ar[$level->level][$section->section])?$rows_ar[$level->level][$section->section]: array();//$wpdb->get_results("select distinct row from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = {$seating_chart_event->seating_chart_id} and level = '{$level->level}' and section = '{$section->section}' order by row ");
                    foreach ($rows as $row) {
                        $alignment = seating_chart::get_section_alignment($seating_chart_id, $level->level, $section->section);
                        $sort_order = seating_chart::get_section_sort_order($seating_chart_id, $level->level, $section->section);
                        
                        ?>
                                <div id="ee_s_row_<?php echo str_replace(" ", "_", $row->row); ?>" class="ee_s_row" style="clear: both;">
                            <?php
                            $seats = $seats_ar[$sort_order][$level->level][$section->section][$row->row];
                            foreach ($seats as $seat) {
                                
                                $ee_seat_availability_class = "";
                                $ee_seat_placeholder = "";
                                $ee_seat_reserved = "";
                                $price = 0;
                                if (function_exists('espresso_members_version') && is_user_logged_in()) {
                                    $price = $seat->member_price;
                                } else {
                                    $price = $seat->price;
                                }
                                $check = seating_chart::check_seat_available($event_id, $seat->id);
                                if ($check == 0) {
                                    $ee_seat_availability_class = 'ee_s_available';
                                } else {
                                    $ee_seat_availability_class = 'ee_s_unavailable';
                                }
                                if (strtolower($seat->custom_tag) == "placeholder") {
                                    $ee_seat_placeholder = "_placeholder";
                                    $ee_seat_availability_class = "placeholder";
                                }
                                if (strtolower($seat->custom_tag) == "reserved") {
                                    $ee_seat_reserved = "_reserved";
                                    $ee_seat_availability_class = "ee_s_unavailable";
                                }
                                ?>
                                        <div id="ee_s_seat_<?php echo $seat->id; ?>" class="ee_s_seat<?php echo $ee_seat_placeholder . $ee_seat_reserved; ?> <?php echo $ee_seat_availability_class; ?>"
                                             event_id="<?php echo $event_id; ?>"
                                             seat_id="<?php echo $seat->id; ?>"
                                             seat="<?php echo $seat->seat; ?>"
                                             price="<?php echo $price; ?>"
                                             row="<?php echo $row->row; ?>"
                                             section="<?php echo $section->section; ?>"
                                             level="<?php echo $level->level; ?>"  >
                                            <span style="display:none;" class="ee_s_custom_tag"><?php echo $seat->custom_tag; ?></span>
                                            <span style="display:none;" class="ee_s_description"><?php echo $seat->description; ?></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                    <?php
                                }
                                ?>
                        </div>
                    <?php
                }
                ?>
                    <div class="ee_s_clear">&nbsp;</div>
                </div>
                <?php
            }
            echo "</div>";
        }
    }
}

function eventespresso_resize_seating_chart_image() {
    $width      = isset($_REQUEST['width'])?$_REQUEST['width']:'';
    $height     = isset($_REQUEST['height'])?$_REQUEST['height']:'';
    $filename   = isset($_REQUEST['filename'])?$_REQUEST['filename']:'file not given';
    $filename   = EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/'.$filename;
    
    if (is_numeric($height) && is_numeric($width) && !empty($filename) && file_exists($filename)) {
        
        $img = new EE_SimpleImage();
        $img->load($filename);
        $img->resize($width, $height);
        $img->output();
    }
    exit();
}

class EE_SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}