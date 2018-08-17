<?php
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Image.class.php");
require_once(__DIR__."/../utils/ImageUploaderTrait.php");
require_once(__DIR__."/../utils/SecureDataTrait.php");
use Upload\ImageUploader;
use Security\DataSecurity;
try {  
  if($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST["titre"]) && !empty($_POST["titre"]) && isset($_FILES["reference_logo"]["tmp_name"]))
      $alt = DataSecurity::secure($_POST["titre"]);
      $extension = ImageUploader::getExtension("reference_logo");
      $url = ImageUploader::mooveImage("reference_logo","../images/references/",$extension,"references");
      $img = new Image(["alt"=>$alt,"url"=>$url,"type"=>"REFERENCE","extension"=>$extension,"description"=>"","createdAt"=>date("Y-m-d H:i:s")]);
      $res = Image::save($img);
      if($res) {
        header("Location: http://localhost/kleos/views/all_references.php");
      }else{
        $_SESSION["error_message"]="une erreur est survenue, veuillez ressayer!";
        header("Location: http://localhost/kleos/views/add_reference.php");
      }
  }else{
    $references = Image::getByType("REFERENCE");
  }
}catch(DatabaseException $e) {
    $references = [];
}
?>