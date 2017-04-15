<?php 
    
    $mediacontroller = new Welcome\Controller\MediaController();
?>


   



    
    
    

    
    
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 portfolio-item">
                    <?php $mediacontroller->getLastMovies(); ?>
                </div>
                <div class="col-sm-6 portfolio-item">
                    <?php $mediacontroller->getLastEpisodes(); ?>
                    
                </div>

            </div>
        </div>
    </section>