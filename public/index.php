<?php

use Phonebook\Core\Application\App;
use Phonebook\Controllers\ContactController;

require_once __DIR__ . '/../vendor/autoload.php';


$app = new App(dirname(__DIR__));



$app->router->get('/', [ContactController::class, 'getContacts']);

$app->router->get('/contact/{id}',[ContactController::class, 'showContact']);

$app->router->get('/contact-create', [ContactController::class, 'createContact']);

$app->router->post('/contact-store', [ContactController::class, 'storeContact']);

$app->router->delete('/contact/{id}', [ContactController::class, 'deleteContact']); // delete DELETE



$app->run();