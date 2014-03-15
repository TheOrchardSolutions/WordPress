<?php
	global $wpdb;
	$msg = "";
	if ( isset($_GET['delete_seating_chart']) )
	{
		$seating_chart_id = $_GET['seating_chart_id'];
		$cls_seating_chart = new seating_chart();
		$result = $cls_seating_chart->delete_seating_chart($seating_chart_id);
		if ( $result === true )
		{
			$msg = __('Deleted seating chart', 'event_espresso');
		}
		else
		{
			if ( is_array($result) )
			{
				$msg = __('Failed to delete the seating chart. It is associated with following events', 'event_espresso') . " - <br/>";
				foreach($result as $k)
				{
					$event = $wpdb->get_row("select * from ".EVENTS_DETAIL_TABLE." where id = ".$k['event_id']);
					if ( $event !== NULL )
					{
						$msg .= "#&nbsp;{$event->event_name}<br/>";
					}
				}
			}
			else
			{
				$msg = __('Failed to delete the seating chart. Most probably its seats has been used with an event', 'event_espresso');
			}
		}
	}
    
?>


<!-- Add App Messaging-->

<!-- START: Step One --> 
<div class="wrap" style="margin-top: 7px; margin-bottom:10px;">
    
    <div id="icon-options-event" class="icon32"></div>
    <h2><?php _e('Manage Seating Charts', 'event_espresso'); ?></h2>
    <?php if ( $msg != "" ) { ?>
    <div id="message" class="updated fade below-h2" style="margin-top:10px;margin-bottom:10px;">
        <p><?php _e($msg,'event_espresso'); ?></p>
    </div>
    <?php } ?>
	<!-- Tabs: Default to Add Custom-->  
	<h2 class="nav-tab-wrapper" style="margin-bottom:10px;">
        <a class="nav-tab" href="admin.php?page=seating_chart&seating_chart_action=create">+ <?php _e('Add seating chart', 'event_espresso'); ?></a>
        <a class="nav-tab nav-tab-active" href="#"><?php _e('My Seating Charts', 'event_espresso'); ?></a>
	</h2>
	
	
	<!-- End Step Two -->
	<div class="clear"></div> 
    
	<div class="wrap" style="margin-bottom:10px;">
        <h2 style="margin-bottom:20px;margin-top:20px;"><?php _e('Seating Chart List', 'event_espresso'); ?></h2>
        <div class="clear"></div>
    <?php 
        $seating_charts = $wpdb->get_results("select esct.* from ".EVENTS_SEATING_CHART_TABLE." esct ");
        if ( count($seating_charts) > 0 ) {
    ?>
			<table width="100%" class="widefat fixed" id="table"> 
				<thead>
					<tr>
						<th style="width:315px;"><?php _e('Seating Chart', 'event_espresso'); ?></th>
						<th style="width:60px;"><?php _e('Layout', 'event_espresso'); ?></th>
						<th><?php _e('Description', 'event_espresso'); ?></th>
						<th style="width:50px;"><?php _e('Seats', 'event_espresso'); ?></th>
					</tr>
				</thead>
				<tbody>
            <?php foreach($seating_charts as $seating_chart) { ?>
					<tr>
						<td>
							<a href="admin.php?page=seating_chart&seating_chart_action=edit&seating_chart_id=<?php echo $seating_chart->id; ?>"><?php _e($seating_chart->name,'event_espresso'); ?></a>
							<div class="row-actions">
								<span class="edit"><a title="Edit Chart" href="admin.php?page=seating_chart&seating_chart_action=edit&seating_chart_id=<?php echo $seating_chart->id; ?>"><?php _e('Edit', 'event_espresso'); ?></a> | </span>
								<span class="inline hide-if-no-js"><a title="Edit Seats" class="editinline" href="admin.php?page=seating_chart&seating_chart_action=seat_list&seating_chart_id=<?php echo $seating_chart->id; ?>"><?php _e('Seats', 'event_espresso'); ?></a> | </span>
								<span class="trash"><a href="admin.php?page=seating_chart&delete_seating_chart=1&amp;seating_chart_id=<?php echo $seating_chart->id; ?>" title="Move this item to the Trash" class="submitdelete"><?php _e('Trash', 'event_espresso'); ?></a> | </span>
                                <span class="section_alignment"><a href="admin.php?page=seating_chart&seating_chart_action=seating_chart_section_alignment&seating_chart_id=<?php echo $seating_chart->id; ?>" title="Set section alignment" class="section_alignment"><?php _e('Section Alignment', 'event_espresso'); ?></a> | </span>
                                <span class="preview-seating-chart"><a href="#" title="View seating chart" class="ee_s_select_seat" seating_chart_id="<?php echo $seating_chart->id; ?>" disable_section="0"><?php _e('View Chart', 'event_espresso'); ?></a></span>
                                
							</div>
						</td>
					<td>				
						<?php if (trim($seating_chart->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR.'seatingchart/images/'.$seating_chart->image_name) ) { ?>
                        <a style="min-height: 75px; min-width: 75px;"  target="_blank" href="<?php echo EVENT_ESPRESSO_UPLOAD_URL.'seatingchart/images/'.$seating_chart->image_name; ?>"><img src="<?php echo ESPRESSO_SEATING_FULLURL.'request.php?filename='.$seating_chart->image_name.'&height=75&width=75&seating_chart_action=resize_layout_image'; ?>" alt="view" /></a>
                        <?php } ?>
					</td>
					 <td><?php _e(nl2br($seating_chart->description),'event_espresso'); ?></td>
					 <td>
                     <?php 
                        $seat_count_row = $wpdb->get_row("select count(1) as total from ".EVENTS_SEATING_CHART_SEAT_TABLE." escest where seating_chart_id = ".$seating_chart->id); 
                        $total_seat = $seat_count_row->total;
                        echo (empty($total_seat) || is_null($total_seat))?"0":$total_seat ;
                     ?>
                     </td>
					</tr>
					
					
            <?php
                }
            ?>
		</tbody>
		</table>
    <?php
        } else {
    ?>
        <div><?php _e('No seating charts are available', 'event_espresso'); ?></div>
    <?php
        }
    ?>
	</div>

	<div class="clear">&nbsp;</div>
	
</div>