<?php
declare(strict_types=1);

session_start();

require 'vendor/autoload.php';

use goldenppit\controllers\ControlleurAccueil;

$config = ['settings' => [
    'displayErrorDetails' => true,
]];

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new \Slim\Container($config);
$app = new \Slim\App($container);


//Chemin Accueil
$app->get('/', ControlleurAccueil::class.':accueil')->setName('racine');


$app->run();