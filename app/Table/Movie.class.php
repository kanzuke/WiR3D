<?php

namespace Welcome\Table;

use Core\String\String;

class Movie {
    private $idMovie;
    private $title;
    private $year;
    private $posters;

    
    private $firstPoster;


    public function getTitle() {
        return $this->title;
    }
    
     public function getYear() {
        return $this->year;
    }
    
    
    public function getPosters() {
        return $this->posters;
    }

    
    /**
     * Return the first poster URL saved in object
     * @return String URL of the first poster
     */
    public function getFirstPoster() {
        if($this->firstPoster === null) {
            $results = explode('</thumb>',$this->posters,1);
            $results = explode('preview="',$results[0]);
            $results = explode('">',$results[1]);
            
            $this->firstPoster = $results[0];
        }
        return $this->firstPoster;
    }

    
    
    
    
    
    
    public function display() {
        return $this->getTitle().' ('.$this->getYear().')';
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