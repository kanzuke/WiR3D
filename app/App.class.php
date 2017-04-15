<?php

namespace Welcome;

use Core\Database\Mysql;
use Welcome\Config\Config;


class App {
    public $title = "Self::Portal";
    
    
    private $config;
    private $mysql_instance;
    
    private static $_instance;
    
    
    
    public function __construct() {
        $this->config = Config::getInstance();
        $this->getMysql();
    }
    
    
    public static function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getMysql() {
        if($this->mysql_instance === null) {
            $this->mysql_instance = new Mysql($this->config->get("MEDIA_MYSQL_DATABASE"),
                                             $this->config->get("MEDIA_MYSQL_USER"),
                                             $this->config->get("MEDIA_MYSQL_PASS"),
                                             $this->config->get("MEDIA_MYSQL_SERVER"),
                                             $this->config->get("MEDIA_MYSQL_PORT"));
        }
        return $this->mysql_instance;
    }
    
    
    
    
}