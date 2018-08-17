<?php 
namespace Security;
trait DataSecurity {

    public static function secure(string $data) {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    public static function hashPassword(string $password) {
       return hash("sha256",$password);
    }
}
?>