<?php

/**
 *
 * @package    TimeTracking
 * @category   Model
 * @license    GPL3
 */

namespace TimeTracking\Model;

/**
 * Description of SaveTask
 *
 * @author purencool
 */
class JsonFile {

    /**
     *
     * @var object with configuration
     */
    private $config;

    /**
     * 
     * @param type $config
     */
    public function __construct($config = NULL) {
        $this->config = $config;
    }

    /**
     * 
     * @return string
     */
    public function getJsonFile() {
        if (!file_exists('data.json')) {
            fopen('data.json', 'w') or die("Can't create file");
            return 'File created';
        }
    }

    /**
     * 
     * @return type
     */
    public function getLoadJsonFile() {
        $log = 'data.json'; // Path to log
        $json = file_get_contents($log); // Load log contents
        $data = json_decode($json, true); // Convert JSON to array
        if (is_array($data)) {
            krsort($data); // Sort by ID;
        }
        return $data;
    }

    public function setSaveJsonFile($data) {
        $json = json_encode($data); // Convert data array back to json
        $myfile = fopen("data.json", "w") or die("Unable to open file!"); // Open file
        fwrite($myfile, $json); // Save file
    }

}
