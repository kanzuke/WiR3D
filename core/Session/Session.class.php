<?php

namespace Core\Session;

class Session {
    protected $sessionTimeoutSecs = 30;
    
    protected static $_instance;
    
    
    public function __construct() {
        $this->start();
        $this->set('lastactivity', time());
    }
    
    
    
    public static function getInstance() {
         if(self::$_instance === null) {
            self::$_instance = new Session();
        }
        return self::$_instance;
    }

    
        
    
    public function start() {
        if (!isset($_SESSION)) session_start();
 	
		if (!empty($_SESSION['lastactivity']) && $_SESSION['lastactivity'] > (time() - $this->sessionTimeoutSecs)) {
			$_SESSION['lastactivity'] = time();
		}
        else {

           //$this->end();
        }
    }
    
    
    
    public function end() {
        if (!isset($_SESSION)) session_start();
        session_unset();
		session_write_close();
    }
    
    
    public function setTimeout($timeoutsecs) {
        $this->sessionTimeoutSecs = $timeoutsecs;
    }
    
    
    
    public function set($index, $value) {
        $_SESSION[$index] = $value;
    }
    
    
    public function clear($index) {
        unset($_SESSION[$index]);
    }
    
    public function clearAll() {
        session_unset();
    }
    
    public function get($index) {
        return (isset($_SESSION[$index])) ? $_SESSION[$index] : null;
    }
    
}
?>