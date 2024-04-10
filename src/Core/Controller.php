<?php

namespace Phonebook\Core;

use Phonebook\Core\Application\App;

class Controller
{

    public function render($view,$params = []): bool|string
    {
        return App::$app->router->renderView($view, $params);
    }


}