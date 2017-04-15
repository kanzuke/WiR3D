<?php

namespace Welcome\Table;

use Core\String\String;

class TVShow {
    private $id;
    private $title;
    private $year;
    
    
    public function getTitle() {
        return $this->title;
    }
    
    
    public function getYear() {
        return $this->year;
    }
    
    
    public function display() {
        return $this->getTitle();
    }
    
    
    /**
     * Return the first letter of the title for ie: pagination purpose.
     * If the first letter is a number, then '#' is returned.
     * @return String first letter
     */
    public function getFirstLetter() {
        $firstLetter = mb_substr($this->title,0,1);
        if(preg_match('/[0-9]{1}/',$firstLetter)) {
            $firstLetter = '0-9';
        }
    
        
        return String::removeAccents($firstLetter);
    }
    
}



?>