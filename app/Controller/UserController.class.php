<?php

namespace Welcome\Controller;


use Welcome\App;
use Core\LDAP;


class UserController extends AppController {
    

    public function getLoggedUser() {
        
        
        $this->render('user.loggeduser', compact('user','errors'));
    }
    
    
    
}



?>