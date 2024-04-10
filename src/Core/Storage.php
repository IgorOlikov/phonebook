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
        return $this->getContactsArrayFromJson();
    }

   public function getContactById(int $contactId) : array
   {
       $contacts = $this->getContactsArrayFromJson();

       return $contacts[$contactId];
   }

   public function createContact(array $contactInfo): void
   {
       $contacts = $this->getContactsArrayFromJson();

       $contacts[] = $contactInfo;

       $this->validateInput($contactInfo);

       $this->overwriteJsonFile($contacts);
   }

   public function deleteContactById(int $contactId) : void
   {
       $contacts = $this->getContactsArrayFromJson();

       if (isset($contacts[$contactId])) {
            unset($contacts[$contactId]);
       }

       $this->overwriteJsonFile($contacts);
   }


   public function getContactsArrayFromJson(): array
   {
       $storagePath = $this->storagePath;

       $contacts = file_get_contents($storagePath, true);

       if ($contacts === '') {
           return [];
       }

       return json_decode($contacts, true);
   }

   public function overwriteJsonFile(array $contacts): void
   {
       $jsonContacts = json_encode($contacts);

       $status = file_put_contents($this->storagePath, $jsonContacts);
   }

   public function validateInput(array $contactFields): void
   {
        if (!isset($contactFields['name']) || !isset($contactFields['number'])) {
            (new Response())->setStatusCode(404);
            exit();
        } elseif ( $contactFields['name'] === '' || $contactFields['number'] === '') {
            (new Response())->setStatusCode(404);
            exit();
        }
   }


}