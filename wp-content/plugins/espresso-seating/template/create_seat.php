<?php
	global $wpdb;
	$msg = "";
	$msg = "Can not add a seat becamse seating chart doens't exists.";
	$seating_chart_id = 0;
	$seating_chart = null;
	if ( isset($_REQUEST['seating_chart_id']) )
	{
		$seating_chart_id = $_REQUEST['seating_chart_id'];
		$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
		if ( $seating_chart != NULL )
		{
			$msg = "";
	
			if ( isset($_POST['insert_seat']) )
			{
		
				$cls_seating_chart = new seating_chart();
				$result = $cls_seating_chart->insert_seat($seating_chart_id,$_POST);
				if ( $result !== false )
				{
					$msg = "Seat created";
				}
				else
				{
					$msg = "Error: [".mysql_errno()."] - ".mysql_error();
				}
			}
		}
	} else {
        echo "Sorry no seating chart was selected";
        exit();
    }
?>

<!-- START: Step Two: Fluid Left  -->
<div class="wrap">
    <div id="icon-options-event" class="icon32"></div>
    <h2>Manage Seating Charts</h2>
    <?php if ( $msg != "" ) { ?>
    <div id="message" class="updated fade below-h2" style="margin-top:10px;margin-bottom:10px;">
        <p><?php _e($msg,'event_espresso'); ?></p>
    </div>
    <?php } ?>
    <h2 class="nav-tab-wrapper" style="margin-bottom:10px;">
        <a class="nav-tab" href="admin.php?page=seating_chart&seating_chart_action=create">+ Add seating chart</a>
        <a class="nav-tab" href="admin.php?page=seating_chart">My Seating Charts</a>
        <a class="nav-tab nav-tab-active" href="#">+ Add seat</a>
    </h2>
    <h2 style="margin-bottom:20px;margin-top:20px;"><?php echo $seating_chart->name; ?> - Add Seat</h2>
    <div class="clear"></div>
    <div class="widget-liquid-left">
        <div id="widgets-left" style="margin-right: 325px;">
            <div class="postbox">
                <div style="float: right; margin-top: 7px; margin-right: 10px;"><a href="admin.php?page=seating_chart&seating_chart_action=seat_list&seating_chart_id=<?php echo $seating_chart_id; ?>">Back to seat lsit</a></div>
                <!-- <h3>Add seat</h3> -->
                
                <div class="form-holder">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data" method="post" id="new_seating_chart" name="new_seating_chart">
                        <input type="hidden" name="insert_seat" value="1" />
                        <ul>
                            
                            <li>
                                <label><?php _e('Custom Tag', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="custom_tag" name="custom_tag">
                                </div>
                            </li>
							<li>
                                <label><?php _e('Level', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="level" name="level">
                                </div>
                            </li>
                            <li>
                                <label><?php _e('Section', 'event_espresso'); ?> <!-- <a class="alignright" href="#">Edit Alignment</a> --></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="section" name="section">
                                </div>
                            </li>
                            <li class="widthx2">
                                <label><?php _e('Row', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="row" name="row">
                                </div>
                            </li>
                            <li class="widthx2 right">
                                <label><?php _e('Seat', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="seat" name="seat">
                                </div>
                            </li>
                            <li class="widthx2">
                                <label><?php _e('Price', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="price" name="price">
                                </div>
                            </li>
                            <li class="widthx2 right">
                                <label><?php _e('Member Price', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <input type="text" class="text" id="member_price" name="member_price">
                                </div>
                            </li>
                            
                            <li>
                                <label><?php _e('Description', 'event_espresso'); ?></label>
                                <div class="input-text-wrap">
                                    <textarea name="description" id="description"></textarea>
                                </div> 
                            </li>
                            <li>
                                <label></label>
                                <input class="button-primary" type="submit" id="sbt" name="sbt" value="Save">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (trim($seating_chart->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR.'seatingchart/images/'.$seating_chart->image_name) ) { ?>
    <!-- Preview Chart: Fixed Right-->
    <div class="widget-liquid-right">
        <div class="right-holder">
            
            <div class="prev">
                <span>Preview</span>
                <span class="map">
                    <a style="min-height: 75px; min-width: 75px;"  target="_blank" href="<?php echo EVENT_ESPRESSO_UPLOAD_URL.'seatingchart/images/'.$seating_chart->image_name; ?>"><img src="<?php echo ESPRESSO_SEATING_FULLURL.'request.php?filename='.$seating_chart->image_name.'&height=280&width=280&seating_chart_action=resize_layout_image'; ?>" alt="view" /></a>
                </span>
            </div>

        </div>
    </div>
    <?php } ?>

</div>
<div class="clear"></div>
