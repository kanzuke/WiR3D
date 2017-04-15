<?php

namespace Core\Config;

class Config {
    
    protected $settings = [];
    protected static $_instance;
    
    protected $configPath = './config/config.inc.php';
    
    
    
    public static function getInstance() {
         if(self::$_instance === null) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }
    
    
    public function __construct() {
        $this->settings = require $this->configPath;
    }
    
    
    /**
     * Get config parameter
     * @param  string $key name of the parameter
     * @return string value of the parameter
     * @createDate 2017-01-29 7:21                        
     */
    public function get($key) {
        if(!isset($this->settings[$key])) return null;
        else return $this->settings[$key];
    }
}