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
class JsonFile {
    
        private $config;

	/**
         * 
         */
	public function __construct($config) {
            $this->config = $config;
	}
        
        /**
         * 
         */
        public function getJsonFile() {
            if(!file_exists ('data.json')) {
                 fopen('data.json', 'w') or die("Can't create file");;
                 return 'File created';
             } 
            
        }
    
    //put your code here
}
