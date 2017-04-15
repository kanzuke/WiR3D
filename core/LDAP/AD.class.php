<?php
    namespace Core\LDAP;



    class AD extends Ldap {
        protected $ldapType = self::TYPE_AD;
        
        protected $ADDomain;
        
        
        
        
        public function setADDomain($ADDomain) {
            $this->ADDomain = $ADDomain;
        }
        
        public function getADDomain() {
            return $this->ADDomain;
        }
        
        
        public function getUsernameAuthId($username) {
            $parts = explode("@", $username);
            return $parts[0].'@'.$this->getADDomain();
        }
    
    }