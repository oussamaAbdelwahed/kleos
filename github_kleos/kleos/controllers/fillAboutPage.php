<?php
session_start();
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Image.class.php");
require_once(__DIR__."/../utils/ImageUploaderTrait.php");
require_once(__DIR__."/../utils/SecureDataTrait.php");
use Upload\ImageUploader;
use Security\DataSecurity;
try{
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_FILES["image"]["tmp_name"])) {
      $title = DataSecurity::secure($_POST["titre"]);
      $extension = ImageUploader::getExtension("image");
      $url = ImageUploader::mooveImage("image","../images/",$extension);
      $description = DataSecurity::secure($_POST["description"]);
      $createdAt =  date("Y-m-d H:i:s");
      $type = "ABOUT";
      $data = ["alt"=>$title,"extension"=>$extension,"url"=>$url,"description"=>$description,"type"=>$type,"createdAt"=>$createdAt];
      $img = new Image($data);
     
      $res = Image::save($img);
      if($res) {
        header("Location: http://localhost/kleos/views/all_about_sections.php");
      }else{
         $_SESSION["error_message"] = "une erreur est survenu, ressayez";
         header("Location: http://localhost/kleos/views/add_about_section.php");
      }
    }else{
      $_SESSION["error_message"] = "champs obligatoires";
      header("Location: http://localhost/kleos/views/add_about_section.php");
    }
  }else{
    $images = Image::getByType("ABOUT");
  }
}catch(DatabaseException $e) {
    //ont peut mettre a jour des messages d erreur dans la session
    header("Location: http://localhost/kleos/views/welcome.php");
    $images = [];
}
?>