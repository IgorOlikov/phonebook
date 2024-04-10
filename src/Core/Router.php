<?php

namespace Phonebook\Core;

use Phonebook\Core\Application\App;

class Router
{

    protected  array $routes = [];

    public Request $request;

    public Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */

    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /*
      [ 'get' => ['/' => [ 0 => 'Phonebook\Controllers\ContactController', 1 => 'getContacts] ] ]
    */

    public function get(string $path, array $callback): void
    {
        $this->routes['get'][$path] = $callback;

    }

    public function post(string $path, array $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function delete(string $path, array $callback): void
    {
        $this->routes['delete'][$path] = $callback;
    }


    public function resolve()
    {
        $path       = $this->request->getPath();

        $method     = $this->request->method();

        $routeParam = $this->request->getRouteParam();

        $callback   = $this->routes[$method][$path] ?? false; //get callback from routes


        if ($callback === false) {
            $this->response->setStatusCode(404);
        }
        if (is_array($callback)) {
            App::$app->controller = new $callback[0];
            $callback[0] = App::$app->controller;
        }   else {
            $this->response->setStatusCode(404);
        }

        //call controller func
        return call_user_func($callback, $this->request, $this->response, $routeParam);
    }



    public function renderView($view, array $params): bool|string
    {
        ob_start();

        include_once App::$ROOT_DIR."/views/$view.php";

        return ob_get_clean();
    }
}