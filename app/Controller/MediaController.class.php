<?php 


namespace Welcome\Controller;

use Welcome\App;
use Core\Database;

class MediaController extends AppController {
    
    

    public function getLastEpisodes() {
        $errors = false;
                
        $query = 'SELECT t.c00 as tvshow, e.c00 as title, e.c12 as season, e.c13 as number, e.c05 as release_date from episode as e, tvshow as t where e.idshow=t.idshow order by e.idEpisode desc limit 10;';
        
        $episodes = App::getInstance()->getMysql()->query($query, 'Welcome\Table\Episode');
        //var_dump($episodes);
        $this->render('media.lastepisodes', compact('episodes','errors'));
    }




    public function getLastMovies() {
        $errors = false;
                
        $query = 'SELECT idMovie,c00 as title, c07 as year from movie order by idMovie desc limit 10;';
        $movies = App::getInstance()->getMysql()->query($query, 'Welcome\Table\Movie');

        $this->render('media.lastmovies', compact('movies','errors'));

    }



    public function library() {
        $errors = false;
        
        
        
        $this->render('media.index',compact('errors'));
    }
    
    
    
    public function movies() {
        $errors = false;
                
        $query = 'SELECT idMovie,c00 as title, c07 as year, c08 as posters from movie order by c00;';
        $movies = App::getInstance()->getMysql()->query($query, 'Welcome\Table\Movie');

        $this->render('media.movies', compact('movies','errors'));
    }
    
    
    public function tvshows() {
        $errors = false;
                
        $query = 'SELECT t.c00 as title from tvshow as t order by t.c00;';
        
        $tvshows = App::getInstance()->getMysql()->query($query, 'Welcome\Table\TVShow');
        $this->render('media.tvshows', compact('tvshows','errors'));
    }
    
}


?>