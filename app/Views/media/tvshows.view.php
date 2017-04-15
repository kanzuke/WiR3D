<?php
    $pagination = array();
    foreach($tvshows as $tvshow) {
        array_push($pagination,$tvshow->getFirstLetter());
    }
    $pagination = array_unique($pagination);
?>




<div class="container">

    <section id="tvshows">
          <div class="page-header">
            <h1 class="text-center">Liste des séries TV</h1>
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
            
                    foreach($tvshows as $tvshow) { ?>
            
                    <div class="col-sm-6 col-md-3">
                        <div>
                            <?php 
                                $f = $tvshow->getFirstLetter();
                                if($f != $previous) {
                                    echo '<a name="list-'.$f.'"></a>';
                                    $previous=$f;
                                }                  
                                                
                            ?>
                            <img src="resources/img/default-show.png" class="img-thumbnail">
                            <p><?php echo $tvshow->display(); ?></p>
                        </div>
                    </div>
                <?php } ?>
        </div>  
    </section>
    
</div>