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

/**
 * Description of IndexController
 *
 * @author work
 */
class IndexController {

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
    public function getSetup() {
        $jsonFileObject = new JsonFile(new DefaultConfig());
        return $jsonFileObject->getJsonFile();
    }

    /**
     *
     * @access public
     */
    public function index() {
        $ret = $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'pomodoroTimer.php');
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'index.php');
        $ret .= $this->obStart->getObStartInclude('Templates' . DIRECTORY_SEPARATOR . 'footer.php');
        return $ret;
    }

}
