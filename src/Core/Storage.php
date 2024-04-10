<?php

namespace Phonebook\Core;


use Phonebook\Core\Application\App;

class Storage
{
    public string $storagePath;

    public function __construct()
    {
        $this->storagePath = App::$ROOT_DIR . '/storage/contacts.json';
    }

    public function getAllContacts() : array
    {
        $storagePath = $this->storagePath;

        $contacts = file_get_contents($storagePath, true);

        return json_decode($contacts, true);

    }


}