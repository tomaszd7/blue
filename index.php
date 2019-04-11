<?php

use Blue\Factory\AppFactory;
use Blue\Service\Provider;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/vendor/autoload.php';


$provider = new Provider();
$provider->setHostUrl("http://google.com");
$provider->setCompetitorUrls([
	"http://wp.pl",
	"http://allegro.pl",
	"http://cnn.com"
]);

$app = AppFactory::create();
$app->setProvider($provider);

$app->run();