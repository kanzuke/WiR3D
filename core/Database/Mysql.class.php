<?php

namespace Core\Database;

use \PDO;

class Mysql {
    protected $mysqlHost;
    protected $mysqlPort;
    protected $mysqlUser;
    protected $mysqlPass;
    protected $mysqlDB;
    
    
    protected $pdo;
    
    
    
    public function __construct($db_name, $db_user, $db_pass, $db_host, $db_port) {
        $this->mysqlHost = $db_host;
        $this->mysqlPort = $db_port;
        $this->mysqlDB = $db_name;
        $this->mysqlUser = $db_user;
        $this->mysqlPass = $db_pass;
    }

    
    
    private function getPDO()  {
        if($this->pdo === null) {
            $pdo = new PDO('mysql:dbname='.$this->mysqlDB.';host='.$this->mysqlHost.';port='.$this->mysqlPort.';charset=utf8', $this->mysqlUser, $this->mysqlPass);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
     
    
    
    public function query($statement, $class_name) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }
    
}


?>