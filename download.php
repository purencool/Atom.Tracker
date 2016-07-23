<?php 
include 'functions.php';
$obj = new TimeTracking\Config\DefaultConfig();
$jsonFile =  new TimeTracking\Model\JsonFile($obj);
$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
if ($mode == 'download-csv') {
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=data.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $jsonFile->csvToString();
}

if ($mode == 'download-json') {
    header("Content-type: text/json");
    header("Content-Disposition: attachment; filename=data.json");
    header("Pragma: no-cache");
    header("Expires: 0");
    $file = fopen($obj->jsonPath, "r");
    echo fgets($file);
    fclose($file);
}
