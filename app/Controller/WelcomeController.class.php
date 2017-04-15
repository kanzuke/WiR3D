<?php

namespace Welcome\Controller;

use Welcome\Controller;
use Core\Auth\LdapAuth;
use Welcome\App;
use Welcome\Session\Session;
use Core\LDAP\LdapUser;
use Core\LDAP\ADUser;

class WelcomeController extends AppController {
    
    
    
    
    /**
     * Login Action
     */
    public function welcome() {
        $errors = false;
        
        $usercontroller = new UserController();
        $usercontroller->getLoggedUser();
        
        $this->render('welcome.search',compact('errors'));
        $this->render('welcome.index', compact('errors'));
        
    }
    
    
    /**
     * [[Description]]
     */
    public function personal() {
            $errors;
        
            if($this->isLogged()) {
                // Get username and password from session variables
                $username = Session::getInstance()->get('username');
                $password = Session::getInstance()->get('password');
                
                // Set binding username and password into LDAP Object
                App::getInstance()->getLdap()->ldapBind($username, $password);
                
                
                if(!empty($_POST)) {
                    // create user object from $_POST entries;
                    $user = new ADUser();
                    
                    
                    
                    
                    $form = new \Core\HTML\BootstrapForm($_POST);
                    
                    
                    
                }
                else {
                $user = $this->searchUser($username);
                var_dump($user);
                    
                    $form = new \Core\HTML\BootstrapForm($user->toArray());
                }

               


                $this->render('users.personal', compact('form', 'errors'));
            }
        else {
            header('Location: index.php');
        }
        
    }
    
    
    public function logout() {
        Session::getInstance()->clearAll();
        
        header('Location: index.php');
    }
    
 
    protected function isLogged() {
        return (Session::getInstance()->get('username')!=null) ? true : false;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*
     *
     */
    protected function searchUser($username) {

        $info = App::getInstance()->getLdap()->query(ADUser::getLdapSearchFilter($username), ADUser::getLdapSearchRetrievedAttributes());
		
			
			$ldapUser = new ADUser();
			$ldapUser->updateUserFromEntries($info);
			
			return $ldapUser;
    }
    
    
}


?>