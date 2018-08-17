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
  if($_SERVER["REQUEST_METHOD"] =='POST') {
    if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["url"])) {
      $id=$_GET["id"];
      $alt = DataSecurity::secure($_POST["titre"]);
      $url=DataSecurity::secure($_POST["url"]);
      $description = DataSecurity::secure($_POST["description"]); 
      if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
        $extension = ImageUploader::getExtension("image");
        $url = ImageUploader::mooveImage("image","../images/",$extension);
      }
      $image = new Image(["id"=>$id,"alt"=>$alt,"description"=>$description,"url"=>$url]);
      $res = Image::update($image);
      if($res) {
         header("Location: http://localhost/kleos/views/all_about_sections.php");
      }else{
         $_SESSION["error_message"] = "une erreur est survenue, veuillez ressayer";
         header("Location: http://localhost/kleos/views/edit_about_section.php?id=".$_GET["id"] ?? "");
      }
    }else{
       header("Location: http://localhost/kleos/views/edit_about_section.php?id=".$_GET["id"] ?? "");
    }
  }else{
    if(isset($_GET["id"]) && ctype_digit($_GET["id"])) {
       $res = Image::delete((int)$_GET['id']);
       if(isset($_GET["fn"]) && !empty($_GET["fn"])) {
         try{
           unlink($_GET["fn"]);
         }catch(Exception $e) {}
       }
       if($res) {
          header("Location: http://localhost/kleos/views/all_about_sections.php");
       }else{
          $_SESSION["error_message"]="une ereeur est survenue";
          header("Location: http://localhost/kleos/views/all_about_sections.php");
       }
    }
  }
}catch(DatabaseException $e) {
 die($e);
 header("Location: http://localhost/kleos/views/all_about_sections.php");
}
?>