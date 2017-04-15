<?php
namespace Core\LDAP;

use Core\Ldap\LdapUser;

/**
 * @author mathieu.gatine
 *
 */
class ADUser extends LdapUser {
    protected $sAMAccountName;
	
	
	
	
	
	/**
	 * 
	 */
	public function __construct() {}
	
	
	/**
	 * @param array $entries array of LDAP attributes
	 */
	public function updateUserFromEntries($entries) {
	   parent::updateUserFromEntries($entries);
		
		if(array_key_exists('thumbnailphoto', $entries[0])) $this->setAccountPicture($entries[0]['thumbnailphoto'][0]);
	}
	
	
	

	public function getLdapEntries() {
		$entries = array();
		
		//$entries['description'] = $this->getDescription();
		//$entries['telephonenumber'] = $this->getTelephoneNumber();
		//$is_admin = ($user['permissions'] == 'admin' ? true : false);
		$entries['telephonenumber'] = ($this->getTelephoneNumber() != "" ? $this->getTelephoneNumber() : array());
		$entries['ipphone'] = ($this->getIpPhone() != "" ? $this->getIpPhone() : array());
		
		
		return $entries;
	}
	
	
	
	
	
	
	/**
	 * @desc return the LDAP String filter to use to search this kind of LDAP Object
	 * @param string $username username to search
	 * @return string LDAP String filter
	 */
	public static function getLdapSearchFilter($username) {
		return "(sAMAccountName=$username)";
		
	}

	
	/**
	 * @desc return all LDAP attributes to look for in an array
	 * @return string[] LDAP attributes to look for
	 */
	public static function getLdapSearchRetrievedAttributes() {
		return array("dn","sn","givenName","mail","displayName","description","telephoneNumber","ipPhone","thumbnailPhoto","title", "department", "company","sAMAccountName");
	}
	
    
    
	
	
	public function __toString() {
		return "dn: ".$this->getDn()."<br>sn: ".$this->getSn()."  givenName: ".$this->getGivenName()."<br>".$this->displayName."<br>";
	}
	
	
	
}


?>