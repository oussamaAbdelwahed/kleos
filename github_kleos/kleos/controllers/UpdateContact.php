<?php
session_start();
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Contact.class.php");
/*require_once(__DIR__."/../utils/SecureDataTrait.php");
use Security\DataSecurity;*/
if(isset($_GET["id"]) && ctype_digit($_GET["id"])) {
  try{
    if(isset($_POST) && !empty($_POST)) {
      $contact = new Contact($_POST);
      $contact->setId((int)$_GET["id"]);
      $res = Contact::update($contact);
      if($res) {
        header("Location: http://localhost/kleos/views/contact.php");
      }else{
        $_SESSION["error_message"] ="une erreur est survenu, veuillez ressayer";
        header("Location: http://localhost/kleos/views/edit_contact.php");
      }
    }     
  }catch(DatabaseException $e) {
      $_SESSION["error_message"] = "une erreur est survenue,veuillez ressayer";
      header("Location: http://localhost/kleos/views/edit_contact.php");
  }
}
?>