<?php 
include 'functions.php';
$obj = new TimeTracking\Config\DefaultConfig();
$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
if ($mode == 'download-csv') {
   // header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=data.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    $file = fopen($obj->csvPath, "r");
    echo fgets($file);
    fclose($file);
}

if ($mode == 'download-json') {
    // header("Content-type: text/json");
    header("Content-Disposition: attachment; filename=data.json");
    header("Pragma: no-cache");
    header("Expires: 0");
    $file = fopen($obj->jsonPath, "r");
    while (!feof($file)) {
        print fgetcsv($file);
    }
    fclose($file_handle);
}
