<?php
    //define('ROOT',dirname(__DIR__));
    define('ROOT',__DIR__);

    require('core/Autoloader.class.php');
    require('app/Autoloader.class.php');
    
    \Core\Autoloader::register();
    \Welcome\Autoloader::register();

ini_set('display_errors', 'On');
error_reporting(E_ALL);

     if(isset($_GET["p"])) {
        $p = $_GET["p"];
    }
    else {
        $p = "welcome"   ;
    }


    $page = '';

    // Routing
    if($p === 'welcome') {
        $controller = new Welcome\Controller\WelcomeController();
        $controller->welcome();
      
    }
    elseif ($p === 'library') {
        $controller = new Welcome\Controller\MediaController();
        $controller->library();
    }
    elseif ($p === 'movies') {
        $controller = new Welcome\Controller\MediaController();
        $controller->movies();
    }
    elseif ($p === 'tvshows') {
        $controller = new Welcome\Controller\MediaController();
        $controller->tvshows();
    }


    ob_start();

  

    $content = ob_get_clean();

?>
<?= $content; ?>


