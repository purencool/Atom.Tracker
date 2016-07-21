<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TimeTracking\Model;

/**
 * Description of SaveTask
 *
 * @author purencool
 */
class SaveTask {

    /**
     * 
     */
    public function __construct() {
        
    }

    public function saveTaskJson($data) {
        $json = json_encode($data); // Convert data array back to json
        $myfile = fopen("data.json", "w") or die("Unable to open file!"); // Open file
        fwrite($myfile, $json); // Save file
    }

}
