<section>

<h1>Derniers épisodes TV
</h1>
    <ul>
<?php foreach($episodes as $episode) { ?>
    <li><?php echo $episode->display(); ?></li>
    
<?php } ?>
    
    </ul>
</section>