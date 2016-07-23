<?php
/**
 * This is a small auto loader for the stand alone 
 * Time tracker
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