<?php

/**
 *
 * @package    TimeTracking
 * @category   Model
 * @license    GPL3
 */


namespace TimeTracking\Model;
/**
 * Description of ObStart
 *
 * @author purencool
 */
class ObStart {

    /**
     * 
     * @param type $string
     * @return type
     */
    public function getObStartString($string) {
        ob_start();
           echo $string;
           $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
    
    /**
     * 
     * @param type $path
     */
    public function getAbsolutePath($path) {
        $retPath = '';
        $x = explode('/', dirname(__FILE__));
        foreach ($x as $cpath) {
            if ($cpath == 'TimeTracking') {
                $retPath .= DIRECTORY_SEPARATOR.$cpath;
                $retPath .= DIRECTORY_SEPARATOR.$path;
                break;
            } else {
                $retPath .= DIRECTORY_SEPARATOR.$cpath;
            }
        }
        return substr($retPath, 1);
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    public function getObStartInclude($string,  $array = NULL) {
        $path = $this->getAbsolutePath($string);
       // print $path;

        ob_start();
           $input_array_from_controller = $array;
           include_once $path;
           $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
