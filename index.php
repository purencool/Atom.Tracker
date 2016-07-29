<?php
include 'functions.php';
$obj = new \TimeTracking\Controller\StandAloneControllers\IndexController();
$feedback = $obj->getSetup();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tracker</title>
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css"/>
        <link rel="shortcut icon" href="./TimeTracking/Assets/images/favicon.ico" />
        <link rel="stylesheet" href="./TimeTracking/Assets/css/styles.css" />

    </head>
    <body>
        <?php print $obj->index();?> 
        <div id='feedback'>
            <?php echo $feedback; ?>
        </div>
    </body>
</html>
