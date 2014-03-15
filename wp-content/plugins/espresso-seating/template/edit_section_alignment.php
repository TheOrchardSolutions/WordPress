<?php global $wpdb;
$msg = "";
$seating_chart_id = $_REQUEST['seating_chart_id'];
$seating_chart = $wpdb->get_row("select * from ".EVENTS_SEATING_CHART_TABLE	." where id = $seating_chart_id ");
if ( $seating_chart == NULL ) {
    echo __('Sorry no seating chart was selected', 'event_espresso');
    exit();
} 
if ( isset($_POST['save_seating_chart_level_section_alignment'])) {
    seating_chart::delete_section_alignment($seating_chart_id);
    //$sections = $wpdb->get_results("select distinct level, section from " . EVENTS_SEATING_CHART_LEVEL_SECTION_ALIGNMENT_TABLE . " where seating_chart_id = $seating_chart_id order by level, section");
    
    foreach($_POST['section_alignment'] as $level=>$sections ) {
        foreach($sections as $section=>$value) {
            $alignment = (isset($_POST['section_alignment'][$level][$section]))?$_POST['section_alignment'][$level][$section]:"left";
            $sort_order = (isset($_POST['section_sort_order'][$level][$section]))?$_POST['section_sort_order'][$level][$section]:"asc";
            seating_chart::save_section_alignment($seating_chart_id,$level,$section,$alignment,$sort_order);
        }            
    }   
    $msg = __('Alignment updated', 'event_espresso');
}
?>
<div class="clear">&nbsp;</div>

<div class="wrap">
    <div id="icon-options-event" class="icon32"></div>
    <h2><?php _e('Manage Seating Charts', 'event_espresso'); ?></h2>
    <?php if ( $msg != "" ) { ?>
    <div id="message" class="updated fade below-h2" style="margin-top:10px;margin-bottom:10px;">
        <p><?php _e($msg,'event_espresso'); ?></p>
    </div>
    <?php } ?>
    <h2 class="nav-tab-wrapper" style="margin-bottom:10px;">
        <a class="nav-tab" href="admin.php?page=seating_chart&seating_chart_action=create">+ Add seating chart</a>
        <a class="nav-tab" href="admin.php?page=seating_chart">My Seating Charts</a>
        <a class="nav-tab" href="admin.php?page=seating_chart&amp;seating_chart_action=add_seat&amp;seating_chart_id=<?php echo $seating_chart_id; ?>">+ <?php _e('Add seat', 'event_espresso'); ?></a>
    </h2>
    <h2 style="margin-bottom:20px;margin-top:20px;"><?php echo $seating_chart->name; ?> - <?php _e('Section Alignment', 'event_espresso'); ?></h2>
    <div class="clear"></div> 

	<div class="wrap" style="margin-bottom:10px;">
        <?php
            $sections = $wpdb->get_results("select distinct level, section from " . EVENTS_SEATING_CHART_SEAT_TABLE. " where seating_chart_id = $seating_chart_id order by level, section");
            if (count($sections) > 0) { 
        ?>
        <form name="frm_edit_section_alignment" id="frm_delete_seat" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <input type="hidden" name="seating_chart_id" value="<?php echo $seating_chart_id; ?>" />
            <input type="hidden" name="save_seating_chart_level_section_alignment" value="1" />
            <table width="100%" class="widefat fixed" id="table"> 
                <thead>
                    <tr>
                        <th style="width:100px;"><?php _e('Level', 'event_espresso'); ?></th>
                        <th style="width:100px;"><?php _e('Section', 'event_espresso'); ?></th>
                        <th style="width:100px;"><?php _e('Alignment', 'event_espresso'); ?></th>
                        <th style="width:100px;"><?php _e('Sort Order', 'event_espresso'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sections as $section) { ?>
                    <tr>
                        <td ><?php echo $section->level; ?></td>
                        <td ><?php echo $section->section; ?></td>
                        <td >
                            <?php
                                $alignment = seating_chart::get_section_alignment($seating_chart_id,$section->level,$section->section);
                                $left = "";
                                $right = "";
                                if ( $alignment == 'left') {
                                    $left = 'checked="checked"';
                                }  else {
                                    $right = 'checked="checked"';
                                }
                            ?>
                            <input type="radio" name="section_alignment[<?php echo $section->level; ?>][<?php echo $section->section; ?>]" value="left" <?php echo $left; ?> />&nbsp;<?php _e('Left', 'event_espresso'); ?>
                            <input type="radio" name="section_alignment[<?php echo $section->level; ?>][<?php echo $section->section; ?>]" value="right" <?php echo $right; ?> />&nbsp;<?php _e('Right', 'event_espresso'); ?>
                        </td>
                        <td >
                            <?php
                                $sort_order = seating_chart::get_section_sort_order($seating_chart_id,$section->level,$section->section);
                                $asc = "";
                                $desc = "";
                                if ( $sort_order == 'desc') {
                                    $desc = 'checked="checked"';                                    
                                }  else {
                                    $asc = 'checked="checked"';
                                }
                            ?>
                            <input type="radio" name="section_sort_order[<?php echo $section->level; ?>][<?php echo $section->section; ?>]" value="asc" <?php echo $asc; ?> />&nbsp;<?php _e('Left to right', 'event_espresso'); ?>
                            <input type="radio" name="section_sort_order[<?php echo $section->level; ?>][<?php echo $section->section; ?>]" value="desc" <?php echo $desc; ?> />&nbsp;<?php _e('Right to left', 'event_espresso'); ?>
                        </td>
                    </tr>                
                    <?php } ?>
                </tbody>
            </table>
            <div class="clear">&nbsp;</div>
            <div>
                <input type="submit" class="button-primary action" name="save_seating_chart_level_section_alignment" value="Save" />
            </div>
        </form>
        <?php } else { ?>
        <div><?php _e('Currently there are no seats in this seating chart.', 'event_espresso'); ?></div>
        <?php } ?>
    </div>
</div>
<div class="clear">&nbsp;</div>