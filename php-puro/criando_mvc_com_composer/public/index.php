<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Router;
use \App\Controller\AppController;
use \App\Controller\LeoController;

$app = new Router();

$app->get('/', function () {
    return AppController::index();
});

$app->get('/users', function () {
    return LeoController::index();
});

$app->post('/users', function () {
    return LeoController::create();
});

$app->get('/list', function () {
    return AppController::list();
});

$app->post('/list', function () {
    return AppController::write();
});

$app->get('/out', function () {
    return AppController::logout();
});

$app->run();