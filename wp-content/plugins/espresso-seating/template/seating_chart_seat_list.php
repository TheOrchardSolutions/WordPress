<?php
	global $wpdb;
	$msg = "";
	$seating_chart_id = isset($_REQUEST['seating_chart_id'])?$_REQUEST['seating_chart_id']:-1;
	$not_deleted = array();
    $failed_to_update = array();
    
    $seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
    if ( $seating_chart == NULL ) {
        echo "Sorry no seating chart was selected";
        exit();
    }
    if ( isset($_POST['bulk_seat_action']) && $_POST['bulk_seat_action'] != '-1') {
        switch($_POST['bulk_seat_action']) {
            case 'bulk_edit':
                $ids = $_POST['seat_ids'];
                if ( isset($_POST['section']) && (empty($_POST['section']) || is_null($_POST['section']))) {
                    unset($_POST['section']);
                }
                if ( isset($_POST['level']) && (empty($_POST['level']) || is_null($_POST['level']))) {
                    unset($_POST['level']);
                }
                if ( isset($_POST['row']) && (empty($_POST['row']) || is_null($_POST['row']))) {
                    unset($_POST['row']);
                }
                if ( isset($_POST['price']) && (empty($_POST['price']) || is_null($_POST['price']))) {
                    unset($_POST['price']);
                }
                if ( isset($_POST['member_price']) && (empty($_POST['member_price']) || is_null($_POST['member_price']))) {
                    unset($_POST['member_price']);
                }
                if ( count($ids) > 0 ) {
                    #$seating_chart_id = $_REQUEST['seating_chart_id'];
                    #$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
                    #if ( $seating_chart != NULL ) {
                        
                    foreach($ids as $seat_id) {

                        #$seat_id = $_REQUEST['seat_id'];
                        $seat = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_SEAT_TABLE." where seating_chart_id = $seating_chart_id and id = $seat_id");
                        if ( $seat !== NULL ) {
                            #if ( isset($_POST['update_seat']) && $_POST['update_seat'] == 1 ) {
                                $cls_seating_chart = new seating_chart();
                                $result = $cls_seating_chart->save_seat($seating_chart_id,$seat_id,$_POST);

                                if ( $result === true ) {
                                    $seat = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_SEAT_TABLE	." where seating_chart_id = $seating_chart_id and id = $seat_id");

                                } else {
                                    $failed_to_update[] = "Failed to update seat [Level: $seat->level, Section: $seat->section, Row: $seat->row, Seat: $seat->seat";
                                }
                            #}
                        }
                    }
                    #}
                    if ( count($failed_to_update) == 0 ) {
                        $msg = "Updated successfully";
                    } else {
                        $msg = "Update process failed!";
                        foreach($failed_to_update as $failed) {
                            $msg .= "<br/>$failed";
                        }
                    }
                }
                break;
            case 'bulk_delete':
                $msg = "";
                $deleted = 0;
                $ids = array();
                if ( isset($_POST['seat_ids']) && count($_POST['seat_ids']) > 0 ) {
                    $ids = $_POST['seat_ids'];
                    $cls_seating_chart = new seating_chart();
                    foreach($ids as $id) {
                        if ( $cls_seating_chart->delete_seat($id) ) {
                            $deleted++;
                        }  else {
                            $row = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_SEAT_TABLE." where id = $id");
                            if ( $row !== NULL )  {
                                array_push($not_deleted,"Section: ".$row->section."; Level: ".$row->level."; Row: ".$row->row."; Seat: ".$row->seat);
                            }
                        }
                    }
                    if ( $deleted > 0 ) {
                        $msg .= "Total number of seats deleted: $deleted<br/>";
                    }
                    if ( count($not_deleted) > 0 ) {
                        $msg .= __('Following seats were not deleted because they have already been used in events:', 'event_espresso')."<br/>";
                        foreach($not_deleted as $v)  {
                            $msg .= $v."<br/>";
                        }
                    }
                } else {
                    $msg = "Sorry no seat was selected to delete!";
                }
                break;
        }
    }
?>
<div class="wrap" style="margin-bottom:10px;">
    <div id="icon-options-event" class="icon32"></div>
    <h2>Manage Seating Charts</h2>
    <?php if ( $msg != "" ) { ?>
    <div id="message" class="updated fade below-h2" style="margin-top:10px;margin-bottom:10px;">
        <p><?php _e($msg,'event_espresso'); ?></p>
    </div>
    <?php } ?>
        <!-- Tabs: Default to Add Custom-->  
	<h2 class="nav-tab-wrapper" style="margin-bottom:10px;">
        <a class="nav-tab" href="admin.php?page=seating_chart&seating_chart_action=create">+ <?php _e('Add Seating Chart', 'event_espresso'); ?></a>
        <a class="nav-tab" href="admin.php?page=seating_chart"><?php _e('My Seating Charts', 'event_espresso'); ?></a>
        <a class="nav-tab" href="admin.php?page=seating_chart&amp;seating_chart_action=add_seat&amp;seating_chart_id=<?php echo $seating_chart_id; ?>">+ <?php _e('Add Seat', 'event_espresso'); ?></a>
	</h2>
    <!-- <h2>Edit Seats</h2> -->
    

    <!-- START: Edit Single Chart  -->

    <?php 
        $seats = seating_chart::get_seat_list($seating_chart_id,'asc');
        if ( count($seats) > 0 ) { 
    ?>

	<!-- Bulk Edit and Add -->
    <h2 style="margin-bottom:20px;margin-top:20px;"><?php echo $seating_chart->name; ?> - <?php _e('Seat List', 'event_espresso'); ?></h2>
    <div class="clear"></div>
	<form name="frm_bulk_seat_action" id="frm_bulk_seat_action" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <input type="hidden" name="bulk_seat_action" id="bulk_seat_action" value="-1" />
        <table width="100%" class="widefat fixed" id="bulk_seat_table" style="display:none"> 
            <tbody>

                <!-- START: Edit Bulk Edit -->
                <tr style="" class="inline-edit-row inline-edit-row-post inline-edit-post bulk-edit-row bulk-edit-row-post bulk-edit-post inline-editor" id="bulk-edit">
                    <td class="colspanchange" colspan="8">
                        <fieldset class="inline-edit-col-left">
                            <div class="inline-edit-col">
                                <h4><?php _e('Bulk Edit', 'event_espresso'); ?></h4>
                                <div id="bulk-title-div">
                                    <div id="bulk-titles">
                                        <!-- <div id="ttle11"><a title="Remove From Bulk Edit" class="ntdelbutton" id="_11">X</a>General 1 3 5</div>
                                        <div id="ttle1"><a title="Remove From Bulk Edit" class="ntdelbutton" id="_1">X</a>General 1 2 5</div> -->
                                    </div>
                                </div>	
                            </div>
                        </fieldset>
                        <fieldset class="inline-edit-col-center inline-edit-categories">
                            <div class="inline-edit-col">
                                </div>
                        </fieldset>
                        <fieldset class="inline-edit-col-right bulk-seats" style="margin: 25px 0 0 10px;">
                            <div class="inline-edit-group">
                                <label class="alignleft">
                                    <span class="title"><?php _e('Level', 'event_espresso'); ?></span>
                                    <input type="text" class="text" id="level" name="level">
                                </label>
                                <label class="alignright">
                                    <span class="title" style="width:7em"><?php _e('Price', 'event_espresso'); ?></span>
                                    <input type="text" class="text" id="price" name="price">
                                </label>
                                
                            </div>

                            <div class="inline-edit-group">
                                <label class="alignleft">
                                    <span class="title" ><?php _e('Section', 'event_espresso'); ?></span>
                                    <input type="text" class="text" id="section" name="section">
                                </label>
                                <label class="alignright">
                                    <span class="title" style="width:7em"><?php _e('Member Price', 'event_espresso'); ?></span>
                                    <input type="text" class="text" id="member_price" name="member_price">
                                </label>
                                
                                <!-- 
                                <label class="alignright">
                                    <span class="title">Tag</span>
                                    <input type="text" class="text" id="name" name="name">
                                </label>
                                -->
                            </div>

                            <div class="inline-edit-group">
                                <label class="alignleft">
                                    <span class="title"><?php _e('Row', 'event_espresso'); ?></span>
                                    <input type="text" class="text" id="row" name="row">
                                </label>
                            </div>
                            <div class="inline-edit-group">
                                <?php _e('NOTE: Leave a field empty if you do not want to modify the value of that field. For example, if you do not want to modify the value of "Section" - leave it empty.', 'event_espresso'); ?>
                            </div>
                    </fieldset>
                        <p class="submit inline-edit-save">
                        <a class="button-secondary cancel alignleft" title="Cancel" href="#inline-edit" accesskey="c" id="bulk_edit_cancel"><?php _e('Cancel', 'event_espresso'); ?></a>
                        <input type="button" accesskey="s" value="Update" class="button-primary alignright" id="bulk_edit" name="bulk_edit">			<input type="hidden" value="list" name="post_view">
                        <input type="hidden" value="edit-post" name="screen">
                        <span style="display:none" class="error"></span>
                        <br class="clear">
                        </p>
                    </td>
                </tr>
            </tbody> 
        </table>
    
        <div class="tablenav top">
            <div class="alignleft actions">
                <select name="seat_list_action" id="seat_list_action">
                    <option selected="selected" value="-1"><?php _e('Bulk Actions', 'event_espresso'); ?></option>
                    <option class="hide-if-no-js" value="edit"><?php _e('Edit', 'event_espresso'); ?></option>
                    <option value="trash"><?php _e('Move to Trash', 'event_espresso'); ?></option>
                </select>
                <input type="button" value="Apply" class="button-secondary action" id="seat_list_doaction" name="">
                <!-- <input type="submit" value="Add Seat" class="button-primary action" name=""> -->
            </div>
        </div>
        <!-- Individual Seat Listings-->
        <table width="100%" class="widefat fixed" id="table"> 
            <thead>
                <tr>
                    <th style="width:25px;"></th>
					<th class="sortable desc"><a href="#"><span><?php _e('Tag', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc"><a href="#"><span><?php _e('Level', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc" style="width:80px;"><a href="#"><span><?php _e('Section', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc" style="width:80px;"><a href="#"><span><?php _e('Row', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc" style="width:80px;"><a href="#"><span><?php _e('Seat', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc"><a href="#"><span><?php _e('Price', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    <th class="sortable desc"><a href="#"><span><?php _e('Member Price', 'event_espresso'); ?></span><span class="sorting-indicator"></span></a></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($seats as $seat) { ?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $seat->id; ?>" name="seat_ids[]" class="seat_ids" id="chk_<?php echo $seat->id; ?>" ></td>
					<td><a href="#" id="custom_tag_<?php echo $seat->id; ?>"><?php echo $seat->custom_tag; ?></a>
					<div class="row-actions">
                            <span class="edit"><a title="<?php _e('Edit this item', 'event_espresso'); ?>" href="admin.php?page=seating_chart&seating_chart_action=edit_seat&amp;seat_id=<?php echo $seat->id; ?>&amp;seating_chart_id=<?php echo $seating_chart_id; ?>"><?php _e('Edit', 'event_espresso'); ?></a> | </span>
                            <span class="inline hide-if-no-js"><a title="<?php _e('Edit this item', 'event_espresso'); ?>" class="seat_editinline" seat_id="<?php echo $seat->id; ?>" href="#"><?php _e('Quick Edit', 'event_espresso'); ?></a> | </span>
                            <span class="trash"><a href="#" title="<?php _e('Move this item to the Trash', 'event_espresso'); ?>" class="seat_submitdelete" seat_id="<?php echo $seat->id; ?>"><?php _e('Trash', 'event_espresso'); ?></a></span>
                        </div></td>
                    <td><a href="#" id="level_<?php echo $seat->id; ?>"><?php echo $seat->level; ?></a>
                        
                    </td>
                    <td><a href="#" id="section_<?php echo $seat->id; ?>"><?php echo $seat->section; ?></a></td>
                    <td><a href="#" id="row_<?php echo $seat->id; ?>"><?php echo $seat->row; ?></a></td>
                    <td><a href="#" id="seat_<?php echo $seat->id; ?>"><?php echo $seat->seat; ?></a></td>
                    <td><a href="#" id="price_<?php echo $seat->id; ?>"><?php echo "$".number_format($seat->price,2,".",","); ?></a></td>
                    <td><a href="#" id="member_price_<?php echo $seat->id; ?>"><?php echo "$".number_format($seat->member_price,2,".",","); ?></a></td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
    <?php } else { ?>
    <div><?php _e('Currently there are no seats in this seating chart.', 'event_espresso'); ?></div>
    <?php } ?>
</div>

<div class="clear">&nbsp;</div>