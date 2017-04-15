<?php

namespace Welcome\Table;

class Episode {
    private $tvshow;
    private $title;
    private $season;
    private $number;
    private $release_date;



    public function getTitle() {
        return $this->title;
    }
    public function getSeason() {
        return $this->season;
    }
    public function getNumber() {
        return $this->number;
    }
    public function getTVShow() {
        return $this->tvshow;
    }

    public function display() {
        return $this->getTVShow().' '.$this->getSeason().'x'.$this->getNumber().' - '.$this->getTitle();
    }
}


?>