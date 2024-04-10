<?php

namespace Phonebook\Core;

use Phonebook\Core\Application\App;

class Controller
{
    public Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage();
    }

    public function render($view,$params = []): bool|string
    {
        return App::$app->router->renderView($view, $params);
    }


}