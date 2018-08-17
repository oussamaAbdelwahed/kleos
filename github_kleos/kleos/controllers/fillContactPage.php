<?php 
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Contact.class.php");
$contact = null;
try{
  $infos = Contact::getAll();
  if(count($infos) > 0) {
    $last = $infos[0];
    foreach ($infos as $key => $value) {
        if($value->id  > $last->id)
           $last = $value;
    }
    $contact = $last;
  }
}catch(DatabaseException $e) {
    // set an error
}
?>