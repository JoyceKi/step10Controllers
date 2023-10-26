<?php

use App\Autoloader;
use App\Controllers\Router;

require_once 'Autoloader.php';
Autoloader::register();

// require_once 'Controllers/Router.php';
$routeur = new Router();
$routeur->routerRequete();


?>