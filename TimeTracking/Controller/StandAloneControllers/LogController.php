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
 * Description of LogController
 *
 * @author work
 */
class LogController {

    private $obStart;

    /**
     * 
     */
    public function __construct() {
        $this->obStart = new ObStart();
    }
    
    /**
     *
     * @access public
     */
    public function getJsonObj() {
        $jsonFileObject = new JsonFile(new DefaultConfig());
        return $jsonFileObject->getLoadJsonFile();
    }
    
    /**
     *
     * @access public
     */
    public function index() {
        
        $mode = isset($_GET['mode'])? $_GET['mode'] : '';
        $taskId = isset($_GET['id'])? $_GET['id'] : '';
        $taskProject = isset($_GET['project'])? $_GET['project'] : '';
        $taskName = isset($_GET['task'])? $_GET['task'] : '';
        $taskObj =  new Tasks();
        $taskResult = $taskObj->getTasksSwitchResult($this->getJsonObj(), $mode, $taskId,$taskName,$taskProject);
        $array =array(
            'mode' => $mode,
            'task' => $task,
            'data' => $this->getJsonObj()
        );

        if($taskResult == 'buildtasks') {
           return  $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'buildTasks.php', $array);
        }
        
        if($taskResult == 'restoretasks') {
          return  $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'restoreTasks.php', $array);
        }
        
       // return  $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'log.php', $array);
    }

}
