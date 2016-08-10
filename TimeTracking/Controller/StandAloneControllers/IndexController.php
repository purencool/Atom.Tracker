<?php

/**
 *
 * @package    TimeTracking
 * @category   Controller
 * @license    GPL3
 */

namespace TimeTracking\Controller\StandAloneControllers;

use TimeTracking\Model\ObStart;
use TimeTracking\Model\JsonFile;
use TimeTracking\Config\DefaultConfig;
use TimeTracking\Model\Tasks;

/**
 * Description of IndexController
 *
 * @author work
 */
class IndexController {

    private $obStart;
    
    private $jsonFileObject;

    /**
     * 
     */
    public function __construct() {
        $this->obStart = new ObStart();
        $this->jsonFileObject = new JsonFile(new DefaultConfig());
    }

    /**
     *
     * @access public
     */
    public function getHoursSpent() { 
        $data = $this->jsonFileObject->getLoadJsonFile();
        $taskObj =  new Tasks();
        return array('time_spent'=>$taskObj->tallyAllTasks($data));

    }
    
    
    
    /**
     *
     * @access public
     */
    public function getSetup() {  
        return $this->jsonFileObject->getJsonFile();
    }

    /**
     *
     * @access public
     */
    public function index() {
        $mode = isset($_GET['mode'])? $_GET['mode'] : '';
        //print_r($_GET); exit;
        if($mode == 'csv') {
           $this->jsonFileObject->jsonToCSV(); 
        }
        $ret = $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'header.php');
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'menuItems.php');
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'pomodoroTimer.php');
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'index.php',$this->getHoursSpent());
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'footer.php');
        return $ret;
    }

}
