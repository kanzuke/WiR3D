<section id="lastmovies">
    <h1>Derniers Films</h1>

    <ul>
<?php foreach($movies as $movie) { ?>
    <li><?php echo $movie->display(); ?></li>
    
<?php } ?>
    
    </ul>

</section>