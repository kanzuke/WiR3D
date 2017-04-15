<?php

namespace Welcome\Controller;
use Core\Controller\Controller;
use Welcome\Session\Session;


class AppController extends Controller {

    protected $template = 'default';
    protected $viewPath; 
    
    
    
    
    public function __construct() {
        parent::__construct();
        
        $this->viewPath = ROOT. '/app/Views/';
        Session::getInstance()->start();
        
        
        
    }
    
}


?>