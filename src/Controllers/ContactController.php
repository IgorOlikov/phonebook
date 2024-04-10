<?php

namespace Phonebook\Controllers;

use Phonebook\Core\Application\App;
use Phonebook\Core\Controller;
use Phonebook\Core\Request;
use Phonebook\Core\Response;
use Phonebook\Core\Storage;

class ContactController extends Controller
{
    private Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage();
    }

    public function getContacts(Request $request)
    {
        $contacts = $this->storage->getAllContacts();

        return $this->render('hello', $contacts);
    }

    public function showContact(Request $request, Response $response, $routeParamId)
    {
        $id  = $request->getRouteParam();

        dd($id);
        echo 'showContact' . $routeParamId;
    }

    public function createContact()
    {
        //return $this->render('createContactView');
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