<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TimeTracking\Controller\StandAloneControllers;

/**
 * Description of IndexController
 *
 * @author work
 */
class IndexController {

    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     *
     * @access public
     */
    public function index() {
        //-- Setup config
       // if (file_exists('../../Config/config.php')) {
       //     include '../../Config/config.php';
       // } else {
       //     include '../../Config/default.config.php';
       // }
       $config= '';
        $jsonFileObject = new \TimeTracking\Model\JsonFile($config);
        return  $jsonFileObject->getJsonFile();
    }

}
