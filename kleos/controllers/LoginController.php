<?php
session_start();
require_once(__DIR__."/../views/components/Connection.class.php");
require_once(__DIR__."/../models/SerializableEntity.interface.php");
require_once(__DIR__."/../models/Admin.class.php");
require_once(__DIR__."/../utils/SecureDataTrait.php");
use Security\DataSecurity;
try{
  if(isset($_POST)) {
    if(isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
       $username = DataSecurity::secure($_POST["username"]);
       $password = DataSecurity::hashPassword(DataSecurity::secure($_POST["password"]));
       $user = Admin::authenticated($username,$password);
       if($user != null) {
         $auth = ["id"=>$user->id,"role"=>$user->role,"username"=>$user->username,"fullName"=> $user->fullName];
         $_SESSION["user"] = $auth;
        /* var_dump($user);
         die();*/
         header("Location: http://localhost/kleos/views/dashboard.php?p=dashboard");
       }else{
         $_SESSION["error_message"] = "username ou mot de passe incorrecte, verifiez !";
         header("Location: http://localhost/kleos/views/login.php?p=login");
       }
    }else{
     $_SESSION["error_message"] = "tous les champs sont requis!";
     header("Location: http://localhost/kleos/views/login.php?p=login");
    }
  }else{
     header("Location: http://localhost/kleos/views/login.php?p=login");
  }
}catch(DatabaseException $e) {
    //set an error
}
?>