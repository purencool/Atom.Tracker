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
        $log = $this->config->jsonPath; // Path to log
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
        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }

    /**
     * 
     * @param type $str
     * @return type
     */
    function csvToString() {

        // Headings and rows
        $headings = array('id','task', 'date_start', 'date_end', 'date_entered','status');
        $array = $this->getLoadJsonFile(); 
   
        $fh = fopen('php://output', 'w');
        ob_start();

        fputcsv($fh, $headings);
        if (!empty($array)) {
            foreach ($array as $key => $item) {
                if ($item['date_start'] != '' && $item['date_end'] != '') {
                    $seconds = $item['date_end'] - $item['date_start'];
                } else {
                    $seconds = time() - $item['date_start'];
                }

                $h = floor(($seconds  / 60) / 60); // Hours
                $m = round(($seconds  / 60)) - ($h * 60); // Minutes
                $item['date_entered'] = $h . '.' . $m;

                $start = !empty($item['date_start'])?  date('M j Y g:i A',$item['date_start']) : 0;
                $item['date_start'] = $start;
                
                $end = !empty($item['date_end'])?  date('M j Y g:i A',$item['date_end']) : 0;
                $item['date_end'] = $end;
                fputcsv($fh, $item);
            }
        }

        $string = ob_get_clean();
        return ($string);
    }

}
