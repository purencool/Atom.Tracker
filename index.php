<?php

/**
 * 
 * @param type $directory
 */
function loadClassPhp($directory) {
    if (is_dir($directory)) {
        $scan = scandir($directory);
        unset($scan[0], $scan[1]); //unset . and ..
        foreach ($scan as $file) {

            if ($directory != './TimeTracking/Templates' && $directory != './TimeTracking/Data'
            ) {
                if (is_dir($directory . "/" . $file)) {
                    loadClassPhp($directory . "/" . $file);
                } else {
                    if (strpos($file, '.php') !== false) {
                        include_once($directory . "/" . $file);
                    }
                }
            }
        }
    }
}

loadClassPhp('./TimeTracking');

$obj = new \TimeTracking\Controller\StandAloneControllers\IndexController();
$feedback = $obj->index();
include('./functions.php');
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
        <?php include_once './TimeTracking/Templates/pomodoroTimer.php'; ?>
        <?php include_once './TimeTracking/Templates/index.php'; ?>
        <?php include_once './TimeTracking/Templates/footer.php'; ?>
    </body>
</html>
