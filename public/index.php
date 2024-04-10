<?php

use Phonebook\Core\Application\App;
use Phonebook\Controllers\ContactController;

require_once __DIR__ . '/../vendor/autoload.php';


$app = new App(dirname(__DIR__));



$app->router->get('/', [ContactController::class, 'getContacts']);

$app->router->get('/contact/{id}',[ContactController::class, 'showContact']);

$app->router->post('/contact-create', [ContactController::class, 'storeContact']);

$app->router->post('/contact/{id}', [ContactController::class, 'deleteContact']); // delete DELETE





$app->run();