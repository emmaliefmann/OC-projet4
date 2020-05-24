<?php 

use EmmaLiefmann\blog\config\Autoloader;
use EmmaLiefmann\blog\config\Router;

require('./config/autoloader.php');
Autoloader::register();
session_start();

$router = new Router();
$router->run();
