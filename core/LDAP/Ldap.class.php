<?php

namespace Core\LDAP;


class Ldap {
    const TYPE_AD   = 1;
    const TYPE_LDAP = 2;
    
    
    protected $ldapHost;
    protected $ldapPort;
    protected $ldapBindDN;
    protected $ldapBindPw;
    protected $ldapBaseDN;
    
    protected $ldapType = self::TYPE_LDAP;
    

    protected $ldapConnection;    // LDAP Link Identifier              
    
    
    protected $_instance;
    
    
    
    
    
    /**
     * Initiate the Ldap Helper object
     * @param string $ldap_host        Ldap server hostname or ip address;
     * @param integer $ldap_port       Ldap server port
     * @param string $ldap_basedn      Ldap server base dn
     * @param string $ldap_binddn='' Ldap server binddn. Default: ''
     * @param string $ldap_bindpw='' Ldap server bindpw. Default: ''
     * @createDate 2017-01-29 8:13          
     */
    public function __construct($ldap_host, $ldap_port, $ldap_basedn, $ldap_binddn='', $ldap_bindpw='') {
        $this->ldapHost = $ldap_host;
        $this->ldapPort = $ldap_port;
        $this->ldapBindDN = $ldap_binddn;
        $this->ldapBindPw = $ldap_bindpw;
        $this->ldapBaseDN = $ldap_basedn;
	}
    
    	
    
    /**
     * Initiate the connection to Ldap Server.
     * @param array array of LDAP Options to pass
     * @return link_identifier LDAP Link identifier
     * @createDate 2017-01-29 8:36                            
     */
	public function ldapConnect($options = array()) {
		$this->ldapConnection = ldap_connect($this->ldapHost, $this->ldapPort);
		
		//some protocol options
		isset($options[LDAP_OPT_REFERRALS]) ? $this->setOption(LDAP_OPT_REFERRALS, $options[LDAP_OPT_REFERRALS]) : $this->setOption(LDAP_OPT_REFERRALS, 0);
		isset($options[LDAP_OPT_PROTOCOL_VERSION]) ? $this->setOption(LDAP_OPT_PROTOCOL_VERSION, $options[LDAP_OPT_PROTOCOL_VERSION]) : $this->setOption(LDAP_OPT_PROTOCOL_VERSION, 3);
		
		return $this->ldapConnection;
	}
    
    
    
    /**
     * Initiate the binding to the LDAP Server
     * @param  string $username='' username to bind
     * @param  string $password='' password to bind
     * @return boolean true if success, false otherwise
     */
    public function ldapBind($username='', $password='') {
        if($this->ldapConnection === null) $this->ldapConnect();
        echo "binding ";
        try {
            if(@ldap_bind($this->ldapConnection, $username, $password)) {
                $this->ldapBindDN = $username;
                $this->ldapBindPw = $password;
                return TRUE;
            }
            else return FALSE;
        }
        catch(Exception $e) {
            return FALSE;
        }
    }
    
    
    
    
    
    /**
     * Set the value of the given option to this LDAP Link Identifier
     * @param [[Type]] $option [[Description]]
     * @param [[Type]] $value  [[Description]]
     */
    public function setOption($option, $value) {
        ldap_set_option($this->ldapConnection, $option, $value);
    }
    
    
    public function setOptions($options = []) {
        foreach($options as $option) {
            if(count($option) == 2) $this->setOption($option[0], $option[1]);
        }
    }
    
    
    
    public function getBindDN() {
        return $this->ldapBindDN;
    }
    
    public function getUsernameAuthId($username) {
         return $username;
    }
    
    
    
    public function query($filter, $attributes) {
        $sr=ldap_search($this->ldapConnection, $this->ldapBaseDN, $filter, $attributes);
		
        return ldap_get_entries($this->ldapConnection, $sr);

    }
    
    
}



//public function checkAuthLdap() {
//		$ds = $this->ldapConnect();
//		
//		if($this->_binddn=="" || $this->_bindpwd=="") return FALSE;
//		elseif (ldap_bind($this->_ldapConnection, $this->_binddn, $this->_bindpwd)) return TRUE;
//		else return FALSE;
//	}
//	
	

?>