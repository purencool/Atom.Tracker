<?php

/**
 *
 * @package    TimeTracking
 * @category   Model
 * @license    GPL3
 */

namespace TimeTracking\Model;

/**
 * Description of Formatting
 *
 * @author purencool
 */
class Formatting {

    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     * 
     * @param type $date
     * @return type
     */
    function dateNice($date) {
        return date('M j Y g:i A', $date);
    }

    /**
     * 
     * @param type $seconds
     * @return type
     */
    function timeNice($seconds) {
        $h = floor(($seconds / 60) / 60); // Hours
        $m = round(($seconds / 60)) - ($h * 60); // Minutes

        return '<span class="hours">' . $h . '</span> hrs : <span class="minutes">' . $m . '</span> mins'; // Display result   
    }
   
}
