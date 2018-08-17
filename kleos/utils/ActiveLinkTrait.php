<?php
namespace Traits;
trait ActiveLink {
  public static $links=[
     "welcome"=>false,
     "about"=>false,
     "activity"=>false,
     "partners"=>false,
     "references"=>false,
     "contact"=>false,
     "login"=>false,
     "dashboard"=>false
  ];

  public static function activate(string $pageName) {
    foreach(self::$links as $key => $value) {
      if($key == $pageName){
        self::$links[$pageName] = true;
      }else{
        self::$links[$key] = false;
      }
    }
  }

}

?>