<?php


namespace Phonebook\Core\Application;

use Phonebook\Core\Controller;
use Phonebook\Core\Request;
use Phonebook\Core\Response;
use Phonebook\Core\Router;

class App
{
    public static string $ROOT_DIR;

    public static App $app;

    public Request $request;

    public Response $response;

    public Router $router;

    public Controller $controller;



    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }


}