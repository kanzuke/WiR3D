<?php

namespace Core\Auth;
use Core\LDAP\Ldap;


class LdapAuth {
    
    
    protected $ldap;
    
    
    public function __construct($ldap) {
        $this->ldap = $ldap;
//        var_dump($ldap);
    }
    
    
    
    
    /**
     * Attempt to log the user
     * @param  string $username username
     * @param  string $password password
     * @return boolean true if logon OK, false otherwise
     */
    public function login($username, $password) {
        $fullusername = $this->ldap->getUsernameAuthId($username);
        
        return $this->ldap->ldapBind($fullusername, $password);
        
		
	}
	
	
    
    
    
    
    
    
}


?>