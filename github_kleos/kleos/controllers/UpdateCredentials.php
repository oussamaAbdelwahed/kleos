<?php
session_start();
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Admin.class.php");
require_once(__DIR__."/../utils/SecureDataTrait.php");
use Security\DataSecurity;
if(isset($_GET["id"]) && ctype_digit($_GET["id"])) {
  if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["fullName"]) && !empty($_POST["fullName"])) {
    try {
      $admin = new Admin($_POST);
      $admin->setId($_GET['id']);
      $res = Admin::update($admin);
      if($res) {
          $_SESSION["user"]["username"] = $_POST["username"];
          $_SESSION["user"]["fullName"] = $_POST["fullName"];
        header("Location: http://localhost/kleos/views/dashboard.php?p=dashboard");
      }else{
       $_SESSION["error_message"] = "use erreur est survenu, ressayer";
       header("Location: http://localhost/kleos/views/edit_credentials.php");
      }
    }catch(DatabaseException $e) {
       $_SESSION["error_message"] = "use erreur est survenu, ressayer";
       header("Location: http://localhost/kleos/views/edit_credentials.php");
    }
  }else{
    header("Location: http://localhost/kleos/views/edit_credentials.php");
  }
}else{
  header("Location: http://localhost/kleos/views/edit_credentials.php");
}
?>