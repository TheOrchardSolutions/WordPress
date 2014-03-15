<?php
	global $wpdb;
	$msg = "Seating chart not found";
	$seating_chart_id = 0;
	
	if ( isset($_REQUEST['seating_chart_id']) )
	{
		
		$seating_chart_id = $_REQUEST['seating_chart_id'];
		$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
		if ( $seating_chart != NULL )
		{
			$msg = "";
			if ( isset($_POST['update_seating_chart']) && $_POST['update_seating_chart'] == 1 )
			{
				$cls_seating_chart = new seating_chart();
				$result = $cls_seating_chart->save_seating_chart($seating_chart_id,$_POST);
				if ( $result === true )
				{
					$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
					$msg = "Seating chart info updated successfully";
				}
				else
				{
					$msg = "Failed to update seating chart info";
				}
			}
		}
		else
		{
			$seating_chart_id = 0;
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
        <a class="nav-tab" href="admin.php?page=seating_chart&seating_chart_action=create">+ Add seating chart</a>
        <a class="nav-tab" href="admin.php?page=seating_chart">My Seating Charts</a>
	</h2>
	
	<h2 style="margin-bottom:20px;margin-top:20px;"><?php echo $seating_chart->name; ?> - Edit</h2>
    <div class="clear"></div>
	<!-- End Step Two -->
<!-- 	<div class="clear"></div>
<h2>Edit Seating Chart</h2> -->
<!-- Add New Chart: Fluid Left --> 
<div class="custom-chart widget-liquid-left" >
	<div id="widgets-left" style="margin-right: 325px;">
		<div class="postbox">
			<!-- <h3>Edit Seating Chart</h3> -->
			<div class="form-holder"> 	
                <?php if ( $seating_chart_id > 0 ) { ?>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data" method="post" id="new_seating_chart" name="new_seating_chart">
					<input type="hidden" name="update_seating_chart" value="1" />
					<ul>
					<li>
							<label><?php _e('Name', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="text" class="text" id="name" name="name" value="<?php echo $seating_chart->name; ?>">
							</div>
						</li>
						<li>
							<label><?php _e('Upload Layout', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="file" id="seats" name="seats">
								<span class="description"><?php _e('Excel file under 2MB', 'event_espresso'); ?></span>
							</div>	
						</li>
						
						<li>
							<label><?php _e('Description', 'event_espresso'); ?></label>
							<div class="textarea-wrap">
								<textarea id="description" name="description"><?php echo $seating_chart->description; ?></textarea>
							</div>
						</li>
						<li>
							<label><?php _e('Attach Preview', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="file" id="image" name="image">
								<span class="description"><?php _e('JPG or PNG under 2MB', 'event_espresso'); ?></span>
							</div>
                            <?php if (trim($seating_chart->image_name) != "" && file_exists(EVENT_ESPRESSO_UPLOAD_DIR.'seatingchart/images/'.$seating_chart->image_name) ) { ?>
                            <div class="input-text-wrap">
                                <a href="<?php echo EVENT_ESPRESSO_UPLOAD_URL.'seatingchart/images/'.$seating_chart->image_name; ?>" target="_blank"><?php _e('View Current preview image', 'event_espresso'); ?></a>
                            </div>   
                            <?php } ?>
						</li>
						<li>
							<label></label>
							<input class="button-primary" type="submit" id="sbt" name="sbt" value="Save">
						</li>
					</ul>
				</form>
                <?php } ?>
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
<!-- END Step One-->
</div>
<!-- End Wrap-->

<div class="clear"></div>