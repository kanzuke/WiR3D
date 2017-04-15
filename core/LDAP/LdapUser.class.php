<?php
namespace Core\LDAP;

/**
 * @author mathieu.gatine
 *
 */
class LdapUser {
	// LDAP non self-editable attribute
	protected $sn ='';
	protected $givenName = '';
	protected $dn = '';
	protected $displayName = ' ';
	protected $description =' ';
	protected $mail = ' ';
    protected $uid = '';
	
    
    protected $title = '';
    protected $department = '';
    protected $company = '';
    
    
	// LDAP self-editable attribute
	protected $telephoneNumber = '';			
	protected $ipPhone = '';		
	
	protected $accountpicture = '';
	
	
	
	
	
	/**
	 * 
	 */
	public function __construct() {}
	
	
	/**
	 * @param array $entries array of LDAP attributes
	 */
	public function updateUserFromEntries($entries) {
		if(array_key_exists('dn', $entries[0])) $this->setDn($entries[0]['dn']);
		
		if(array_key_exists('sn', $entries[0])) $this->setSn($entries[0]['sn'][0]);
		if(array_key_exists('givenname', $entries[0])) $this->setGivenName($entries[0]['givenname'][0]);
		if(array_key_exists('displayname', $entries[0])) $this->setDisplayName($entries[0]['displayname'][0]);
		if(array_key_exists('description', $entries[0])) $this->setDescription($entries[0]['description'][0]);
        
        if(array_key_exists('title', $entries[0])) $this->setTitle($entries[0]['title'][0]);
        if(array_key_exists('department', $entries[0])) $this->setDepartment($entries[0]['department'][0]);
        if(array_key_exists('company', $entries[0])) $this->setCompany($entries[0]['company'][0]);
        
        
		
		if(array_key_exists('mail', $entries[0])) $this->setMail($entries[0]['mail'][0]);
		if(array_key_exists('telephonenumber', $entries[0])) $this->setTelephoneNumber($entries[0]['telephonenumber'][0]);
		if(array_key_exists('ipphone', $entries[0])) $this->setIpPhone($entries[0]['ipphone'][0]);
		
		if(array_key_exists('jpegphoto', $entries[0])) $this->setAccountPicture($entries[0]['jpegphoto'][0]);
	}
	
	
	
	
	/**
	 * @param string $dn Distinguished Named of the LDAP Object
	 * @param string $sn
	 * @param string $givenName
	 * @param string $displayName
	 * @param string $description
	 * @param string $telephoneNumber
	 * @param string $ipPhone
	 */
	public function updateUser($dn, $sn, $givenName, $displayName, $description, $telephoneNumber, $ipPhone) {
		$this->setDn($dn);
		$this->setSn($sn);
		$this->setGivenName($givenName);
		$this->setDisplayName($displayName);
		$this->setDescription($description);
        
        
        
		$this->setTelephoneNumber($telephoneNumber);
		$this->setIpPhone($ipPhone);
	}
	
	
	
	
	
	public function getDn() {return $this->dn;}
	public function setDn($dn) {
        $this->dn = $dn;//utf8_encode($dn);
    }
	
	public function getSn() {return $this->sn;}
	public function setSn($sn) {
        $this->sn = utf8_encode($sn);
    }
	
	public function getGivenName() {return $this->givenName;}
	public function setGivenName($givenname) {
//        $this->givenName = utf8_encode($givenname);
        $this->givenName = $givenname;
    }
	
	
	public function getDisplayName() {return $this->displayName;}
	public function setDisplayName($displayName) {$this->displayName = $displayName;}
	
	
	public function getDescription() {return $this->description;}
	public function setDescription($description) {$this->description = $description;}
    
    
    public function getUid() {return $this->uid;}
	public function setUid($uid) {$this->uid = $uid;}
    
    
    
    
    
//    Organization attributes    
    public function getTitle() {return $this->title;}
    public function setTitle($title)  {
        $this->title = $title;//utf8_encode($title);
    }
    
    public function getDepartment() {return $this->department;}
    public function setDepartment($department)  {
        $this->department = $department; //utf8_encode($department);
    }
    
    public function getCompany() {return $this->company;}
    public function setCompany($company)  {
        $this->company = utf8_encode($company);
    }
    
    
    
	
	public function getTelephoneNumber() {return $this->telephoneNumber;}
	public function setTelephoneNumber($telephoneNumber) {$this->telephoneNumber = $telephoneNumber;}
	
	public function getIpPhone() {return $this->ipPhone;}
	public function setIpPhone($ipPhone) {
		$this->ipPhone = $ipPhone;
	}
	
	public function getMail() {return $this->mail;}
	public function setMail($mail) {$this->mail = $mail;}
	
	public function getAccountPicture() {return $this->accountpicture;}
	public function setAccountPicture($accountpicture) {$this->accountpicture = $accountpicture;}
    
    
    
    
    
    
    
    
    
	
	public function getLdapDn() {
        return utf8_decode($this->getDn());
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
		return "(uid=$username)";
		
	}

	
	/**
	 * @desc return all LDAP attributes to look for in an array
	 * @return string[] LDAP attributes to look for
	 */
	public static function getLdapSearchRetrievedAttributes() {
		return array("dn","sn","givenName","mail","displayName","description","telephoneNumber","ipPhone","thumbnailPhoto","title", "department", "company","uid");
	}
	
	
	
	public function getImageAccountPicture() {
		if($this->getAccountPicture()!=null && $this->getAccountPicture()!="") {
			return "data:image/jpeg;base64,".base64_encode($this->getAccountPicture());
		}
		else {
			return "resources/images/default_picture.png";
		}
	}

	
	public function __toString() {
		return "dn: ".$this->getDn()."<br>sn: ".$this->getSn()."  givenName: ".$this->getGivenName()."<br>".$this->displayName."<br>";
	}
	
     
    
    public function toArray() {
        $array = array("dn" => $this->getDn(),
                     "sn" => $this->getSn(),
                     "givenname" => $this->getGivenName(),
                     "mail"  => $this->getMail(),
                     "displayname" => $this->getDisplayName(),
                     "description" => $this->getDescription(),
                     "telephonenumber" => $this->getTelephoneNumber(),
                     "ipphone" => $this->getIpPhone(),
                     "accountpicture" => $this->getAccountPicture(),
                     "title" => $this->getTitle(),
                     "department" => $this->getDepartment(),
                     "company" => $this->getCompany(),
                     "uid" => $this->getUid());

        return $array;
        
    }
	
	
}


?>