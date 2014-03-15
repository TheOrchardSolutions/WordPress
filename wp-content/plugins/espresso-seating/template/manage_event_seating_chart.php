<?php
	global $wpdb;
	$msg = "";
	$event_id = $_REQUEST['event_id'];
	$seating_chart = NULL;
	$seating_chart_id = 0;
	$event = $wpdb->get_row("select * from ".EVENTS_DETAIL_TABLE." where id = $event_id");
	if ( $event == NULL )
	{
		$msg = "Sorry event not found.";
	}
	else
	{
		$tmp = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_EVENT_TABLE." where event_id = $event_id");
		if ( $tmp !== NULL )
		{
			$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE." where id = ".$tmp->seating_chart_id);
			if ( $seating_chart !== NULL )
			{
				$seating_chart_id = $seating_chart->id;
			}
		}
		if ( $seating_chart_id <= 0 )
		{
			$msg = "Sorry no associated seating chart was found.";
		}
		else
		{
			if ( isset($_POST['toggle_seat']) && count($_POST['seat_ids']) > 0 )
			{
				foreach($_POST['seat_ids'] as $v)
				{
					if ( $_POST['occupied'] == 1 )
					{
						seating_chart::mark_seat_un_available($event_id,$v);
					}
					else
					{
						seating_chart::mark_seat_available($event_id,$v);
					}
				}
				$msg = "Seat status updated";
			}
		}
	}
?>
<div class="clear">&nbsp;</div>
<?php
	if ( $msg != "" )
	{
?>
<div id="message" class="updated fade" style="margin-top:5px;margin-bottom:5px;">
<?php
		echo $msg;
?>
</div>
<?php
	}
?>
<div style="margin-bottom:10px;">
	<a href="admin.php?page=events"><< back to event list</a>
</div>
<?php 
	
	if ( $event !== NULL && $seating_chart !== NULL )
	{
		$seats = $wpdb->get_results("select * from ".EVENTS_SEATING_CHART_SEAT_TABLE." where seating_chart_id = $seating_chart_id  order by level, section, row+0, seat+0");
		if ( count($seats) > 0 )
		{

?>
        <script language="javascript">
			function mark_available()
			{
				jQuery('#occupied').val("0");
				jQuery('#frm_toggle_seat').submit();
			}
			
			function mark_un_available()
			{
				jQuery('#occupied').val("1");
				jQuery('#frm_toggle_seat').submit();
			}
		</script>
        <form name="frm_toggle_seat" id="frm_toggle_seat" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <input type="hidden" name="toggle_seat" value="1" />
            <input type="hidden" name="occupied" id="occupied" value="1"  />
            <div>
                <table  id="table" class="widefat fixed" width="100%"> 
                    <thead>
                        <tr>
                            <th style="text-align:center;width:60px;">Select</th>
                            <th style="text-align:center;width:50px;">Level</th>
                            <th style="text-align:center;width:70px;">Section</th>
                            <th style="text-align:center;width:50px;">Row</th>
                            <th style="text-align:center;width:50px;">Seat</th>
                            <th style="text-align:center;width:100px;">Price</th>
                            <th style="text-align:center;width:120px;">Member price</th>
                            <th style="text-align:center;width:110px;">Custom tag</th>
                            <th style="text-align:center;">Seat status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($seats as $seat)
                        {
                    ?>
                        <tr>
                            <td>
                            <?php
								$check = seating_chart::check_seat_available($event_id,$seat->id);
								if ( $check == 0 || $check == -1 )
								{
							?>
                            <input type="checkbox" name="seat_ids[]" value="<?php echo $seat->id; ?>" />
                            <?php
								}
							?>
                            </td>
                            <td><?php echo $seat->level; ?></td>
                            <td style="text-align:center;"><?php echo $seat->section; ?></td>
                            <td style="text-align:center;"><?php echo $seat->row; ?></td>
                            <td style="text-align:center;"><?php echo $seat->seat; ?></td>
                            <td style="text-align:center;"><?php echo "$".number_format($seat->price,2,".",","); ?></td>
                            <td style="text-align:center;"><?php echo "$".number_format($seat->member_price,2,".",","); ?></td>
                            <td><?php echo $seat->custom_tag; ?></td>
                            <td>
                           	<?php 
								if ( $check == 1 )
								{
									$tmp = $wpdb->get_row("select a.*, sces.purchase_datetime from ".EVENTS_SEATING_CHART_EVENT_SEAT." sces inner join ".EVENTS_ATTENDEE_TABLE." a on sces.attendee_id == a.id where sces.seat_id = {$seat->id} and sces.event_id = $event_id");
									if ( $tmp !== NULL )
									{
										echo "Purchased by <strong>{$tmp->fname} {$tmp->lname} on ".date("Y-m-d",strtotime($tmp->purchase_datetime));
									}
								}
								elseif ( $check == -1 )
								{
									echo "Marked un-available by admin";
								}
								elseif ( $check == 0 )
								{
									echo "Available";
								}
								elseif ( $check == -2 )
								{
									echo "This seat is not associated with this event";
								}
							?>
                            </td>
                        </tr>                
                    <?php	
                        }	
                    ?>
                    </tbody>
                </table>        
            </div>
            <div class="clear">&nbsp;</div>
            <div>
                <a style="margin-left:5px"class="button-primary" href="#" onclick="mark_available();">Mark available</a>
                &nbsp;
                <a style="margin-left:5px"class="button-primary" href="#" onclick="mark_un_available();">Mark un-available</a>
            </div>
        </form>
<?php
		}
	}
?>

<div class="clear">&nbsp;</div>