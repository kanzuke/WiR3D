<?php

//namespace Core\API;
//require './RestAPI.class.php';



class TvdbAPI extends RestAPI {
    
    private $instance = null;
    
    private $apikey = "693850AF644D1527";
    private $userkey= "CE5BF7940AFBD144";
    private $username = "kanzuke";
    
    private $token = null;
    
    
    
    private $URL_LOGIN ='https://api.thetvdb.com/login';
    
    
    public function __construct() {}

    
    public static function getInstance() {
        if($instance === null) {
            $this->instance = new TVDBApi();
        }
        return $this->instance;
    } 
    
    
    
    
    
    
    
    
    public function setParameters($apikey, $userkey, $username) {
        $this->apikey = $apikey;
        $this->userkey = $userkey;
        $this->username = $username;
    }
    
    
    public function load() {
        if($this->token == null) {
            $result = $this->post($this->URL_LOGIN, $this->getLoginData());
                var_dump($result);
        }
    }
    
    
    
    
    
    
    
    private function getLoginData() {
        $data = array(
            "apikey" => $this->apikey,
            "userkey" => $this->userkey,
            "username" => $this->username
        );
        return $data;
    }
    
}



?>