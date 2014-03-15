<?php
	global $wpdb;
	$msg = "";
	if ( isset($_POST['insert_seating_chart']) )
	{
		
		
        if ( isset($_POST['name']) && !empty($_POST['name']) && strlen(trim($_POST['name'])) > 0 )  {
            $cls_seating_chart = new seating_chart();
            $seating_chart_id = $cls_seating_chart->insert_seating_chart($_POST);
            if ( $seating_chart_id > 0 )
            {
                $msg = "Seating chart created";
            }
            else
            {
                $msg = "Error: [".mysql_errno()."] - ".mysql_error();
            }
        } else {
            $msg = "Failed to create seating chart. Seating chart name missing!";
        }
	}
	

?>


<!-- Tabs: Default to Add Custom-->  


<!-- Add New Chart: Fluid Left --> 
<div class="wrap" style="margin-bottom:10px;">
    <div id="icon-options-event" class="icon32"></div>
    <h2>Manage Seating Charts</h2>
    <?php if ( $msg != "" ) { ?>
    <div id="message" class="updated fade below-h2" style="margin-top:10px;margin-bottom:10px;">
        <p><?php _e($msg,'event_espresso'); ?></p>
    </div>
    <?php } ?>
    <h2 class="nav-tab-wrapper" style="margin-bottom:10px;">
<a class="nav-tab nav-tab-active" href="#">+ Add seating chart</a><a class="nav-tab" href="admin.php?page=seating_chart">My Seating Charts</a>
</h2>
    <h2 style="margin-bottom:20px;margin-top:20px;">New Seating Chart</h2>
    <div class="clear"></div>
<div class="custom-chart widget-liquid-left">
	<div id="widgets-left" style="margin-right: 325px;">
		<div class="postbox">
			<!-- <h3>New Seating Chart</h3> -->
			<div class="form-holder"> 	
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data" method="post" id="new_seating_chart" name="new_seating_chart">
					<input type="hidden" value="1" name="insert_seating_chart">
					<ul>
					<li>
							<label><?php _e('Name', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="text" class="text" id="name" name="name">
							</div>
						</li>
						<li>
							<label><?php _e('Upload Layout', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="file" id="seats" name="seats">
								<span class="description"><?php _e('Excel/CSV file under 2MB', 'event_espresso'); ?></span>
							</div>	
						</li>
						
						<li>
							<label><?php _e('Description', 'event_espresso'); ?></label>
							<div class="textarea-wrap">
								<textarea id="description" name="description"></textarea>
							</div>
						</li>
						<li>
							<label><?php _e('Attach Preview', 'event_espresso'); ?></label>
							<div class="input-text-wrap">
								<input type="file" id="image" name="image">
								<span class="description"><?php _e('JPG or PNG under 2MB', 'event_espresso'); ?></span>
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

<!-- How To: Fixed Right -->  
<div class="how-to widget-liquid-right">
	<div class="right-holder">
		<div class="step active">
			<span>Step One</span>
			<h3>Upload Custom Seating Chart</h3>
			<p><a href="<?php echo ESPRESSO_SEATING_FULLURL.'sample.xls'; ?>"><?php _e('Download sample layout excel file', 'event_espresso'); ?></a></p>
			<p><a href="<?php echo ESPRESSO_SEATING_FULLURL.'sample.csv'; ?>"><?php _e('Download sample layout csv file', 'event_espresso'); ?></a></p>
		</div>
		
		<div class="step">
			<span>Step Two</span>
			<h3>Edit Details</h3>
			<p>Edit Seating Alignments</p>
		</div>
		
		<div class="step last">
			<span>Step Three</span>
			<h3>Add to Event Listing</h3>
			<p>Activate in Event Listing</p>
		</div>
	</div>
</div>
<!-- END Step One-->
</div>
<!-- End Wrap-->

<div class="clear"></div>
<!-- 
<div style="margin-bottom:10px;">
	<a class="button-secondary" href="admin.php?page=seating_chart">back to seating chart list</a>
</div>
<div>
	<form name="new_seating_chart" id="new_seating_chart" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
    	<input type="hidden" name="insert_seating_chart" value="1" />
        <div>
            <label>Name:</label>
            <input type="text" name="name" id="name"  />
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label>Upload excel file</label>
            <input type="file" name="seats" id="seats" />
        </div>
        <div>
            <label>Attach seating chart layout image</label>
            <input type="file" name="image" id="image" />
        </div>
        <div>
            <label>&nbsp;</label>
            <input type="submit" name="sbt" id="sbt" />
        </div>
    </form>
</div>
-->

