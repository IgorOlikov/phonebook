<?php

namespace Phonebook\Controllers;

use Phonebook\Core\Application\App;
use Phonebook\Core\Controller;
use Phonebook\Core\Request;
use Phonebook\Core\Response;

class ContactController extends Controller
{
    public function getContacts(Request $request)
    {

       return $this->render('hello');

    }

    public function showContact(Request $request, Response $response, $routeParamId)
    {
        $id  = $request->getRouteParam();

        dd($id);
        echo 'showContact' . $routeParamId;
    }

    public function storeContact()
    {
        //
    }

    public function deleteContact()
    {
        //
    }

}