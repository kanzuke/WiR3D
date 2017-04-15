<?php

require '../core/API/RestAPI.class.php';
require '../core/API/TvdbAPI.class.php';



ini_set('display_errors', 'On');
error_reporting(E_ALL);



$tvdbapi = new TvdbAPI();
$tvdbapi->load();

?>