<?php

namespace Phonebook\Controllers;

use Phonebook\Core\Controller;
use Phonebook\Core\Request;
use Phonebook\Core\Response;


class ContactController extends Controller
{

    public function getContacts(Request $request): bool|string
    {
        $contacts = $this->storage->getAllContacts();

        return $this->render('index', $contacts);
    }

    public function showContact(Request $request, Response $response, $contactId): bool|string
    {
        $contact = $this->storage->getContactById($contactId);

        return $this->render('show-contact', $contact);
    }

    public function createContact(): bool|string
    {
        return $this->render('create-contact');
    }

    public function storeContact(Request $request, Response $response)
    {
       $contactInfo = $request->getBody();

       $this->storage->createContact($contactInfo);

       $response->redirect('/');
    }

    public function deleteContact(Request $request, Response $response, $contactId)
    {
        $this->storage->deleteContactById($contactId);

        $response->redirect('/');
    }

}