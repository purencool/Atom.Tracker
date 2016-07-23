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
        $path = $this->config->jsonPath;
        if (!file_exists($path)) {
            fopen($path, 'w') or die("Can't create file");
            return 'File created';
        }
    }

    /**
     * 
     * @return type
     */
    public function getLoadJsonFile() {
        $log = $this->config->jsonPath;// Path to log
        $json = file_get_contents($log); // Load log contents
        $data = json_decode($json, true); // Convert JSON to array
        if (is_array($data)) {
            krsort($data); // Sort by ID;
        }
        return $data;
    }

    /**
     * 
     * @param type $data
     */
    public function setSaveJsonFile($data) {
        $json = json_encode($data); // Convert data array back to json
        $myfile = fopen($this->config->jsonPath, "w") or die("Unable to open file!"); // Open file
        fwrite($myfile, $json); // Save file
    }
    
    /**
     * 
     */
    public function jsonToCSV() {
        $data = $this->getLoadJsonFile();
        $fp = fopen($this->config->csvPath, 'w');
        foreach ($data  as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }

}
