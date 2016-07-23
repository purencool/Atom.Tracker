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
        <title>Atom.Tracker</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.css" />
        <!-- Font Awesome 4.4.0 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="./TimeTracking/Assets/css/styles.css" />
        <style>

        </style>
    </head>
    <body>
        <div id='feedback'>
            <?php echo $feedback; ?>
        </div>
        <?php print $obj->index();?>
        
    </body>
</html>
