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
        return $this->renderView($view, $params);
    }

    public function renderView($view, array $params): bool|string
    {
        ob_start();

        include_once App::$ROOT_DIR.'/views/layouts/head.php';
        include_once App::$ROOT_DIR."/views/$view.php";

        return ob_get_clean();
    }

}