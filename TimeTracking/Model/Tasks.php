<?php

/**
 *
 * @package    TimeTracking
 * @category   Model
 * @license    GPL3
 */

namespace TimeTracking\Model;

use TimeTracking\Model\JsonFile;
use TimeTracking\Config\DefaultConfig;
use TimeTracking\Model\Formatting;

/**
 * Description of Tasks
 *
 * @author purencool
 */
class Tasks {

    /**
     * 
     * @param type $data
     */
    public function setSaveTask($data) {
        $obj = new JsonFile(new DefaultConfig());
        $obj->setSaveJsonFile($data);
    }

    /**
     * 
     * @param type $data
     * @param type $taskName
     */
    private function newTasks($data, $taskName) {
        $id = time();
        $data[$id]['id'] = $id;
        $data[$id]['task'] = $taskName;
        $data[$id]['date_start'] = $id;
        $data[$id]['date_end'] = '';
        $data[$id]['date_entered'] = $id;
        $data[$id]['status'] = 1;
        $this->setSaveTask($data);
    }

    /**
     * 
     * @param array $data
     * @param type $id
     */
    private function statusTasks($data, $id) {
        $data[$id]['status'] = 1; // Set the status to active
        $this->setSaveTask($data);
    }

    /**
     * 
     * @param array $data
     * @param type $id
     */
    private function deleteTasks($data, $id) {

        $data[$id]['status'] = 3; // Set the status to inactive
        $this->setSaveTask($data);
    }

    /**
     * 
     * @param array $data
     * @param type $id
     */
    private function stopTasks($data, $id) {

        $data[$id]['date_end'] = time();
        $this->setSaveTask($data);
    }

    /**
     * 
     * @return string
     */
    private function buildTasks() {
        ///--- see templates
        return 'buildtasks';
    }

    /**
     * 
     * @return string
     */
    private function restoreTasks() {
        ///--- see templates
        return 'restoretasks';
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function tallyAllTasks($data) {
        $format = new Formatting();
        $count = 0; // Initial value for tally
        
        if (is_array($data)) {

            # Run through each record:  
            foreach ($data as $task) {

                # Ignore inactive records:
                if ($task['status'] == 1) {

                    # If task has not stopped yet
                    if ($task['date_end'] == '') {
                        $task['date_end'] = time(); // Set the end date to now
                    } // END if

                    $current = $task['date_end'] - $task['date_start']; // Number of seconds for task
                    $count = $count + $current; // Add to tally
                } // END if
            } // END foreach 
        } // END if is_array

        return $format->timeNice($count); // Return the time.
    }

    /**
     * 
     * @param type $data
     * @param type $mode
     * @param type $taskId
     */
    public function getTasksSwitchResult($data, $mode, $taskId, $taskName = NULL) {
      
        $return = '';
        if ($mode != '') {
            switch ($mode) {
                case 'new':
                     $this->newTasks($data,$taskName);
                    break;
                case 'status':
                    $this->statusTasks($data, $taskId);
                    break;
                case 'delete':
                     $this->deleteTasks($data, $taskId);
                    break;
                case 'stop':
                    $this->stopTasks($data, $taskId);
                    break;
                case 'build':
                    $return = $this->buildTasks($data);
                    break;
                case 'restore':
                    $return = $this->restoreTasks($data);
                    break;
            } // END switch
        } else {
             $return = 'buildtasks';
        }
        return $return;
    }

}
