<?php

namespace Phonebook\Core;


class Request
{
    public int|null $routeParam = null;

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path,'?');

        //get id replace return param id
        $str = trim($path,'/');

        $idParam = explode('/',$str,2);

        if (isset($idParam[1])) {

           $id = (int)$idParam[1];

           $path = str_replace($id,'{id}', $path);

           $this->routeParam = $id;
        }

        if ($position === false) {
            return $path;
        }

        return substr($path,0,$position);
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    public function isDelete(): bool
    {
        return $this->method() === 'delete';
    }


    public function getBody(): array
    {
        $body = [];

        if ($this->method() === 'get')  {
            foreach ($_GET as $key => $value)   {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post'){
            foreach ($_POST as $key => $value)  {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function getRouteParam(): int|null
    {
        return $this->routeParam;
    }
}