<?php
//Admin functions

//Creates folders in the uploads directory to facilitate addons and templates
function espresso_seating_create_upload_directories() {
    // Create the required folders
    $folders = array(
        EVENT_ESPRESSO_UPLOAD_DIR . '/seatingchart/images/',
    );
    foreach ($folders as $folder) {
        wp_mkdir_p($folder);
        @ chmod($folder, 0755);
    }
}