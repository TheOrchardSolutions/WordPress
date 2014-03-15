<?php

class seating_chart {

    var $seats_column;
    var $seating_chart_column;

    function __construct() {
        $this->seats_column = array('seating_chart_id', 'level', 'section', 'row', 'seat', 'price', 'member_price', 'custom_tag', 'description');
        $this->seating_chart_column = array('name', 'description');
    }

    function load_seating_chart_column($data_source) {
        $data_array = array();
        foreach ($data_source as $k => $v) {
            if (in_array($k, $this->seating_chart_column)) {
                $data_array[$k] = $v;
            }
        }
        return $data_array;
    }

    function load_seats_column($data_source) {
        $data_array = array();
        foreach ($data_source as $k => $v) {
            if (in_array($k, $this->seats_column)) {
                $data_array[$k] = $v;
            }
        }
        return $data_array;
    }

    function insert_seating_chart($data_source) {
        global $wpdb;
        $data_array = $this->load_seating_chart_column($data_source);
        $result = $wpdb->insert(EVENTS_SEATING_CHART_TABLE, $data_array);
        if ($result !== false) {
            $result = $wpdb->insert_id;
            $this->upload_seating_chart_layout($result);
            $this->upload_seating_chart_preview($result);
        }
        return $result;
    }

    function upload_seating_chart_preview($seating_chart_id) {
        global $wpdb;
        if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $tmp_row = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_TABLE . " where id = $seating_chart_id");
            if ($tmp_row !== NULL && $tmp_row->image_name !== NULL && trim($tmp_row->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/' . $tmp_row->image_name)) {
                unlink(EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/' . $tmp_row->image_name);
            }
            if (copy($_FILES['image']['tmp_name'], EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/' . $seating_chart_id . '_' . $_FILES['image']['name'])) {
                $data_array = array("image_name" => $seating_chart_id . '_' . $_FILES['image']['name']);
                $wpdb->update(EVENTS_SEATING_CHART_TABLE, $data_array, array("id" => $seating_chart_id));
            }
        }
    }

    function upload_seating_chart_layout($seating_chart_id) {
        if (isset($_FILES['seats']) && is_uploaded_file($_FILES['seats']['tmp_name'])) {
            $file_name = $_FILES['seats']['name'];
            $ar = explode(".", $file_name);
            switch ($ar[count($ar) - 1]) {
                case 'xls':
                    $this->upload_seating_chart_excel($seating_chart_id, $_FILES['seats']);
                    break;
                case 'csv':
                    $this->upload_seating_chart_csv($seating_chart_id, $_FILES['seats']);
                    break;
            }
        }
    }

    function upload_seating_chart_csv($seating_chart_id, $file) {

        $filename = $file['tmp_name'];
        $handle = fopen("$filename", "r");
        $header = true;
        $index_array = array();
        $insert_data = array();
        while (($row_data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($header) {
                $header = false;
                $j = 0;
                foreach ($row_data as $v) {
                    $index_array[$j] = $v;
                    $j++;
                }
            } else {
                $j = 0;
                $tmp = array();
                foreach ($row_data as $v) {
                    if (in_array($index_array[$j], $this->seats_column)) {
                        $tmp[$index_array[$j]] = $v;
                    }
                    $j++;
                }
                if (count($tmp) > 0) {
                    array_push($insert_data, $tmp);
                }
            }
        }
        foreach ($insert_data as $tmp) {
            $this->insert_seat($seating_chart_id, $tmp);
        }
    }

    function upload_seating_chart_excel($seating_chart_id, $file) {
        require_once(dirname(__FILE__) . '/reader.php');
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251');
        $data->read($file['tmp_name']);

        $index_array = array();
        $insert_data = array();
        for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
            $tmp = array();
            for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                if ($i == 1) {
                    $index_array[$j] = $data->sheets[0]['cells'][$i][$j];
                } else {
                    if (in_array($index_array[$j], $this->seats_column)) {
                        $tmp[$index_array[$j]] = $data->sheets[0]['cells'][$i][$j];
                    }
                }
            }
            if (count($tmp) > 0 && $i > 1) {
                array_push($insert_data, $tmp);
            }
        }

        foreach ($insert_data as $tmp) {
            $this->insert_seat($seating_chart_id, $tmp);
        }
    }

    function save_seating_chart($seating_chart_id, $data_source) {
        global $wpdb;
        $data_array = $this->load_seating_chart_column($data_source);
        $result = $wpdb->update(EVENTS_SEATING_CHART_TABLE, $data_array, array('id' => $seating_chart_id));
        if ($result !== false) {

            $this->upload_seating_chart_layout($seating_chart_id);
            $this->upload_seating_chart_preview($seating_chart_id);
            $result = true;
        }
        return $result;
    }

    /*
     * Returns true or an array containing event ids that this seating chart is associated with
     */

    function delete_seating_chart($seating_chart_id) {
        global $wpdb;
        $result = array();
        $rows = $wpdb->get_results("select event_id from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where seating_chart_id = $seating_chart_id ", ARRAY_A);
        if (count($rows) > 0) {
            $result = $rows;
        } else {
            $check = false;
            $seats = $wpdb->get_results("select * from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = $seating_chart_id ");
            if (count($seats) > 0) {
                foreach ($seats as $seat) {
                    $row = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where seat_id = " . $seat->id);
                    if ($row !== NULL) {
                        $check = true;
                        break;
                    }
                }
            }
            if (!$check) {
                $seating_chart = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_TABLE . " where id = $seating_chart_id ");
                if ($seating_chart !== NULL) {
                    if (trim($seating_chart->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/' . $seating_chart->image_name)) {
                        unlink(EVENT_ESPRESSO_UPLOAD_DIR . 'seatingchart/images/' . $seating_chart->image_name);
                    }
                }
                $wpdb->query("delete from " . EVENTS_SEATING_CHART_TABLE . " where id = $seating_chart_id ");
                $wpdb->query("delete from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = $seating_chart_id ");
                $result = true;
                delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'asc'));
                delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'desc'));
                delete_transient(seating_chart::get_level_list_transient($seating_chart_id));
                delete_transient(seating_chart::get_section_list_transient($seating_chart_id));
                delete_transient(seating_chart::get_row_list_transient($seating_chart_id));
            } else {
                $result = false;
            }
        }
        return $result;
    }
    
    static function get_seat_list_transient($seating_chart_id,$sort_order) {
        return "ee_seatingchart_".$seating_chart_id."_".$sort_order;
    }
    
    static function get_seat_ar_list($seating_chart_id, $sort_order = 'asc') {
        global $wpdb;
        $seats = array();
        if (!empty($seating_chart_id) && !is_null($seating_chart_id) && is_numeric($seating_chart_id)) {
            $transient = seating_chart::get_seat_list_transient($seating_chart_id,$sort_order);
            if ( FALSE === ($seats = get_transient($transient))) {
                $seats = $wpdb->get_results("select * from ".EVENTS_SEATING_CHART_SEAT_TABLE." where seating_chart_id = $seating_chart_id order by level, section, row+0, seat+0 $sort_order ");
                
                $tmp = array();
                foreach($seats as $seat) {
                    $tmp[$seat->level][$seat->section][$seat->row][] = $seat;
                }
                $seats = $tmp;
                set_transient($transient, $seats, 60*60*24*365);
            }
        }
        return $seats;
    }
    
    static function get_seat_list($seating_chart_id,$sort_order = 'asc') {
        $seats = array();$seats_ar = seating_chart::get_seat_ar_list($seating_chart_id,$sort_order);
        foreach($seats_ar as $level) {
            foreach($level as $section) {
                foreach($section as $row) {
                    foreach($row as $seat) {
                        array_push($seats,$seat);
                    }
                }
            }
        }
        return $seats;
    }

    function insert_seat($seating_chart_id, $data_source) {
        global $wpdb;
        $data_array = array();
        $data_array = $this->load_seats_column($data_source);
        $data_array['seating_chart_id'] = $seating_chart_id;
        delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'asc'));
        delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'desc'));
        delete_transient(seating_chart::get_level_list_transient($seating_chart_id));
        delete_transient(seating_chart::get_section_list_transient($seating_chart_id));
        delete_transient(seating_chart::get_row_list_transient($seating_chart_id));
        $result = $wpdb->insert(EVENTS_SEATING_CHART_SEAT_TABLE, $data_array);
        if ($result !== false) {
            $result = true;
        }
        return $result;
    }

    function save_seat($seating_chart_id, $seat_id, $data_source) {
        global $wpdb;
        $data_array = $this->load_seats_column($data_source);
        if ( count($data_array) > 0 ) {
            delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'asc'));
            delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'desc'));
            delete_transient(seating_chart::get_level_list_transient($seating_chart_id));
            delete_transient(seating_chart::get_section_list_transient($seating_chart_id));
            delete_transient(seating_chart::get_row_list_transient($seating_chart_id));
            $result = $wpdb->update(EVENTS_SEATING_CHART_SEAT_TABLE, $data_array, array("seating_chart_id" => $seating_chart_id, "id" => $seat_id));
            if ($result !== false) {
                $result = true;
            }
        } else {
            $result = true;
        }
        return $result;
    }

    function delete_seat($seat_id) {
        $result = false;
        global $wpdb;
        $check = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where seat_id = $seat_id and attendee_id > 0");
        if ($check === NULL) {
            $seat = $wpdb->get_row("select * from ". EVENTS_SEATING_CHART_SEAT_TABLE." where id = ".$seat_id);
            $seating_chart_id = $seat->seating_chart_id;
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where id = $seat_id");
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where seat_id = $seat_id ");
            delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'asc'));
            delete_transient(seating_chart::get_seat_list_transient($seating_chart_id,'desc'));
            delete_transient(seating_chart::get_level_list_transient($seating_chart_id));
            delete_transient(seating_chart::get_section_list_transient($seating_chart_id));
            delete_transient(seating_chart::get_row_list_transient($seating_chart_id));
            $result = true;
        }
        return $result;
    }

    function associate_event_seating_chart($seating_chart_id, $event_id) {
        global $wpdb;
        $check = false;
        $result = false;
        $row = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where event_id = $event_id");
        if ($row !== NULL) {
            $seats = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_SEAT_TABLE . " s inner join " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " es on s.id = es.seat_id where s.seating_chart_id = " . $row->seating_chart_id . " and es.attendee_id > 0 ");
            if ($seats !== NULL) {
                $check = true;
            }
        }

        if (!$check || $seating_chart_id == 0) {
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where event_id = $event_id ");
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where event_id = $event_id ");
            if ($seating_chart_id > 0) {
                $data_array = array("event_id" => $event_id, "seating_chart_id" => $seating_chart_id);
                $wpdb->insert(EVENTS_SEATING_CHART_EVENT_TABLE, $data_array);
            }
            $result = true;
        }
        return $result;
    }

    /*
     * If seat available return 0
     * If seat marked un-avilable by admin return -1
     * If seat not associated with the event return -2	 
     * If seat purchased by an attendee return 1
     * If seat is just selected but not yet confirmed return 2
     */

    static function check_seat_available($event_id, $seat_id) {
        global $wpdb;
        $result = -2;
        $seating_chart_event = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where event_id = $event_id ");
        if ($seating_chart_event !== NULL) {
            $seating_chart_seat = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = " . $seating_chart_event->seating_chart_id . " and id = $seat_id ");
            if ($seating_chart_seat !== NULL) {
                $seating_chart_event_seat = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where event_id = $event_id and seat_id = $seat_id");
                if ($seating_chart_event_seat !== NULL) {
                    if ($seating_chart_event_seat->attendee_id !== NULL && $seating_chart_event_seat->attendee_id > 0) {
                        $result = 1;
                    } elseif ($seating_chart_event_seat->occupied == 0) {
                        $result = 2;
                    } else {
                        $result = -1;
                    }
                } else {
                    $result = 0;
                }
            }
        }
        return $result;
    }

    /*
     * This function will return false only if a seat is purchased by an attendee
     * in that case a seat can not be marked available.
     */

    static function mark_seat_available($event_id, $seat_id) {
        global $wpdb;
        $result = true;
        if (seating_chart::check_seat_available($event_id, $seat_id) != 1) {
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where event_id = $event_id and seat_id = $seat_id");
        } else {
            $result = false;
        }
        return $result;
    }

    /*
     * It will return true only when seat was available because only then it can be marked un-available
     */

    static function mark_seat_un_available($event_id, $seat_id) {
        global $wpdb;
        $result = true;
        $check = seating_chart::check_seat_available($event_id, $seat_id);
        if ($check == 0) {
            $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where event_id = $event_id and seat_id = $seat_id");
            $data_array = array("seat_id" => $seat_id, "event_id" => $event_id, "by_admin" => 1, "occupied" => 1);
            $wpdb->insert(EVENTS_SEATING_CHART_EVENT_SEAT_TABLE, $data_array);
        } else {
            $result = false;
        }
        return $result;
    }

    static function release_a_seat($booking_id) {
        global $wpdb;
        $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where id = $booking_id ");
    }

    static function book_a_seat($event_id, $seat_id) {
        global $wpdb;
        $price = 0;
        $row = $wpdb->get_row("select price,member_price from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where id = $seat_id");
        if (function_exists('espresso_members_version') && is_user_logged_in()) {
            $price = number_format($row->member_price, 2, '.', '');
        } else {
            $price = number_format($row->price, 2, '.', '');
        }
        $data_array = array("seat_id" => $seat_id, "event_id" => $event_id, "occupied" => 0, "purchase_price" => $price, "purchase_datetime" => date("Y-m-d H:i:s"));
        $wpdb->insert(EVENTS_SEATING_CHART_EVENT_SEAT_TABLE, $data_array);
        return $wpdb->insert_id;
    }

    static function confirm_a_seat($booking_id, $attendee_id) {
        global $wpdb;
        $data_array = array("attendee_id" => $attendee_id, "occupied" => 1);
        $wpdb->update(EVENTS_SEATING_CHART_EVENT_SEAT_TABLE, $data_array, array("id" => $booking_id));
    }

    static function get_purchase_price($booking_id) {
        global $wpdb;
        $price = 0;
		$booking_id = seating_chart::parse_booking_info($booking_id);
        $row = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where id = $booking_id ");
        if ($row !== NULL) {
            $price = $row->purchase_price;
        }
        return $price;
    }

    static function clear_booking() {
        global $wpdb;
        $wpdb->query("delete from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " where purchase_datetime < '" . date("Y-m-d H:i:s", strtotime("-60 minutes")) . "' and occupied = 0");
        $wpdb->query("delete sces from " . EVENTS_SEATING_CHART_EVENT_SEAT_TABLE . " sces left join " . EVENTS_ATTENDEE_TABLE . " ea on sces.attendee_id = ea.id where ea.id is null  and sces.attendee_id is not null");
    }

    /*
     * If event is not associated with any seating chart then it will return boolean FALSE
     * Else it will return the seating chart id
     */

    static function check_event_has_seating_chart($event_id) {
        global $wpdb;
        $result = false;
        $check = $wpdb->get_row("select * from " . EVENTS_SEATING_CHART_EVENT_TABLE . " where event_id = $event_id");
        if ($check !== NULL) {
            $result = $check->seating_chart_id;
        }
        return $result;
    }

    static function parse_booking_info($booking_info) {
        $booking_id = -1;
        $tmp = trim($booking_info);
        if ($tmp != '') {
            $tmpar = explode("|", $tmp);
			//echo "<pre>".print_r(explode("|", $tmp),true)."</pre>";;
            if (count($tmpar) > 1) {
                $tmpar2 = split(":", $tmpar[count($tmpar) - 1]);
                if (count($tmpar2) == 2) {
                    $booking_id = $tmpar2[1];
                }
            }
        }
        return $booking_id;
    } 
    
    static function get_price_range($event_id) {
        global $wpdb;
        $result = array("max" => 0, "min" => 0);
        if (function_exists('espresso_members_version') && is_user_logged_in()) {
            $price_field = "member_price";
        } else {
            $price_field = "price";
        }
        
        $sql = "select min(scs.{$price_field}) as min_price, max(scs.{$price_field}) as max_price from " . EVENTS_SEATING_CHART_SEAT_TABLE . " scs inner join " . EVENTS_SEATING_CHART_EVENT_TABLE . " sce on scs.seating_chart_id = sce.seating_chart_id where sce.event_id = $event_id ";
        $price_row = $wpdb->get_row($sql);    
        
        if ($price_row !== NULL) {
            $result['min'] = $price_row->min_price;
            $result['max'] = $price_row->max_price;
        } 
        
        return $result;
    }
    
    static function get_section_alignment_transient($seating_chart_id,$level,$section) {
        return  "ee_alignment_".$seating_chart_id."_".$level."_".$section;
    }

    static function get_section_alignment($seating_chart_id, $level, $section) {
        global $wpdb;

        $level = strtolower($level);
        $section = strtolower($section);
        $alignment = 'left';
        
        $transient = seating_chart::get_section_alignment_transient($seating_chart_id,$level,$section);
        if ( FALSE === ($row = get_transient($transient))) {
            $sql = $wpdb->prepare("select alignment, sort_order from " . EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE . " where seating_chart_id = %d and level = '%s' and section = '%s' ", $seating_chart_id, $level, $section);    
            $row = $wpdb->get_row($sql);
            set_transient($transient,$row,60*60*24*15);
        } 
        if ($row !== NULL && !empty($row)) {
            
            $alignment = $row->alignment;
        }
        return $alignment;
    }

    static function get_section_sort_order($seating_chart_id, $level, $section) {
        global $wpdb;

        $level = strtolower($level);
        $section = strtolower($section);
        $sort_order = 'asc';
        $transient = seating_chart::get_section_alignment_transient($seating_chart_id,$level,$section);
        if ( FALSE === ($row = get_transient($transient))) {
            $sql = $wpdb->prepare("select alignment, sort_order from " . EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE . " where seating_chart_id = %d and level = '%s' and section = '%s' ", $seating_chart_id, $level, $section);
            $row = $wpdb->get_row($sql);
            set_transient($transient,$row,60*60*24*15);
        }
        
        if ($row !== NULL && !empty($row)) {
            $sort_order = $row->sort_order;
        }
        return $sort_order;
    }

    static function delete_section_alignment($seating_chart_id) {

        global $wpdb;
        $sql = $wpdb->prepare("delete from " . EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE . " where seating_chart_id = %d ", $seating_chart_id);
        $wpdb->query($sql);
    }

    static function save_section_alignment($seating_chart_id, $level, $section, $alignment = "left", $sort_order = "asc") {
        global $wpdb;
        $level = strtolower($level);
        $section = strtolower($section);
        $sql = $wpdb->prepare("insert into " . EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE . " (seating_chart_id, level, section, alignment, sort_order) values (%d,'%s','%s','%s', '%s')", $seating_chart_id, $level, $section, $alignment, $sort_order);
        $wpdb->query($sql);
        $transient = seating_chart::get_section_alignment_transient($seating_chart_id,$level,$section);
        delete_transient($transient);
    }
    
    static function get_level_list_transient($seating_chart_id) {
        return "ee_level_list_$seating_chart_id";
    }
    
    static function get_level_list($seating_chart_id) {
        global $wpdb;
        $levels = array();
        $transient = seating_chart::get_level_list_transient($seating_chart_id);
        if ( false === ($levels = get_transient($transient))) {
            $levels = $wpdb->get_results("select distinct level from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = $seating_chart_id order by level ");
            set_transient($transient, $levels,60*60*24*365);
        }
        return $levels;
    }
    
    static function get_section_list_transient($seating_chart_id) {
        return "ee_section_list_$seating_chart_id";
    }
    
    static function get_section_ar_list($seating_chart_id) {
        global $wpdb;
        $sections = array();
        $transient = seating_chart::get_section_list_transient($seating_chart_id);
        if ( false === ($sections = get_transient($transient))) {
            //$sections = $wpdb->get_results("select distinct section from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = $seating_chart_id and level = '$level' order by section ");
            $sections = array();
            $levels = seating_chart::get_level_list($seating_chart_id);
            if ( is_array($levels) && count($levels) > 0 ) {
                foreach($levels as $level) {
                    $rs = $wpdb->get_results("select distinct section from ".EVENTS_SEATING_CHART_SEAT_TABLE." where seating_chart_id = $seating_chart_id and level = '$level->level' order by level");
                    $sections[$level->level] = $rs;
                }
            }
            set_transient($transient, $sections,60*60*24*365);
        }
        return $sections;
    }
    
    static function get_section_list($seating_chart_id,$level) {
        $sections_ar = seating_chart::get_section_ar_list($seating_chart_id);
        $sections = isset($sections_ar[$level])?$sections_ar[$level]: array();
        return $sections;
    }
    
    static function get_row_list_transient($seating_chart_id) {
        return "ee_row_list_$seating_chart_id";
    }
    
    static function get_row_ar_list($seating_chart_id) {
        global $wpdb;
        $rows = array();
        
        $transient = seating_chart::get_row_list_transient($seating_chart_id);
        if ( false === ($rows = get_transient($transient))) {
            $rows = array();
            $levels = seating_chart::get_level_list($seating_chart_id);
            $sections_ar = seating_chart::get_section_ar_list($seating_chart_id);
            if ( is_array($levels) && count($levels) > 0 ) {
                foreach($levels as $level) {
                    $sections = isset($sections_ar[$level->level])?$sections_ar[$level->level]: array();
                    foreach($sections as $section) {
                        $rs = $wpdb->get_results("select distinct row from " . EVENTS_SEATING_CHART_SEAT_TABLE . " where seating_chart_id = {$seating_chart_id} and level = '{$level->level}' and section = '{$section->section}' order by row+0 ");
                        $rows[$level->level][$section->section] = $rs;
                    }
                }
            }
            set_transient($transient, $rows,60*60*24*365);
        }
        return $rows;
    }
    
    static function get_row_list($seating_chart_id,$level,$section) {
        $rows_ar = seating_chart::get_row_ar_list($seating_chart_id);
        $rows = isset($rows_ar[$level][$section])?$rows_ar[$level][$section]: array();
        return $rows;
    }
    
    
}