<?php
    $pagination = array();
    foreach($movies as $movie) {
        array_push($pagination,$movie->getFirstLetter());
    }
    $pagination = array_unique($pagination);
?>




<div class="container">

    <section id="movies">
          <div class="page-header">
            <h1 class="text-center">Liste des films</h1>
          </div>

        <div class="row text-center">
            <ul class="pagination">
                <?php foreach($pagination as $p) { ?>
                    <li><a href="#list-<?= $p; ?>"><?= $p; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        
        
        <div class="row movie-panel">
                
                <?php 
                    $index = 0;
                    $previous = '';        
            
                    foreach($movies as $movie) { ?>
            
                    <div class="col-sm-6 col-md-4">
                        <div>
                            <?php 
                                $f = $movie->getFirstLetter();
                                if($f != $previous) {
                                    echo '<a name="list-'.$f.'"></a>';
                                    $previous=$f;
                                }                  
                                                
                            ?>
                            <img src="<?php echo $movie->getFirstPoster(); ?>" class="img-thumbnail">
                            <p><?php echo $movie->display(); ?></p>
                        </div>
                    </div>
                <?php } ?>
        </div>  
    </section>
    
</div>