<?php

//Install/update data tables in the Wordpress database

function espresso_seating_data_tables_install() {
    $table_version = ESPRESSO_SEATING_VERSION;
	
	$table_name = "events_seating_chart";
	$sql = " id int(11) NOT NULL AUTO_INCREMENT,   
			 name varchar(255) DEFAULT NULL,       
             description text,
			 image_name varchar(255) DEFAULT NULL,                            
			 PRIMARY KEY  (id)";
	event_espresso_run_install ($table_name, $table_version, $sql);
	
	$table_name = "events_seating_chart_seat";
	$sql = " id int(11) NOT NULL AUTO_INCREMENT,
			 seating_chart_id int(11) DEFAULT NULL,
			 level varchar(255) DEFAULT NULL,
			 section varchar(255) DEFAULT NULL,
			 row varchar(255) DEFAULT NULL,
			 seat varchar(255) DEFAULT NULL,
			 price float DEFAULT NULL,
			 member_price float DEFAULT NULL,
			 custom_tag text,
			 description text,
			 PRIMARY KEY  (id)";
	event_espresso_run_install ($table_name, $table_version, $sql);
	
	$table_name = "events_seating_chart_event";
	$sql = " event_id int(11) DEFAULT NULL,
			 seating_chart_id int(11) DEFAULT NULL ";
	event_espresso_run_install ($table_name, $table_version, $sql);
	
	$table_name = "events_seating_chart_event_seat";
	$sql = " id int(11) NOT NULL AUTO_INCREMENT,
			 seat_id int(11) DEFAULT NULL,
			 event_id int(11) DEFAULT NULL,
			 attendee_id int(11) DEFAULT NULL,
			 purchase_price float DEFAULT NULL,
			 purchase_datetime datetime DEFAULT '0000-00-00 00:00:00',
			 by_admin int(11) DEFAULT '0' COMMENT '0=No,1=marked occupied by admin',
			 occupied int(11) DEFAULT '1' COMMENT '0=Free,1=occupied (basically entry in this table means occupied, but still keeping this option for any future functionality)',
			 PRIMARY KEY  (id)";
	event_espresso_run_install ($table_name, $table_version, $sql);
	
	$table_name = "events_seating_chart_level_section_alignment";
	$sql = " seating_chart_id int(11) DEFAULT NULL,                        
             level varchar(255) DEFAULT NULL,                              
             section varchar(255) DEFAULT NULL,                            
             alignment varchar(100) DEFAULT NULL,                          
             sort_order varchar(100) DEFAULT NULL";
	event_espresso_run_install ($table_name, $table_version, $sql);

	//Create the uplaod directories
	espresso_seating_create_upload_directories();
}
