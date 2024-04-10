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

   public function createContact(array $contactInfo)
   {
       $contacts = $this->getContactsArrayFromJson();

       $contacts[] = $contactInfo;

       //validate fields

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

       return json_decode($contacts, true);
   }

   public function overwriteJsonFile(array $contacts)
   {
       $jsonContacts = json_encode($contacts);

       $status = file_put_contents($this->storagePath, $jsonContacts);
   }


}