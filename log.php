<?php 
include 'functions.php';
$obj = new \TimeTracking\Controller\StandAloneControllers\LogController();
print $obj->index();
