<?php
require_once(__DIR__.'/../../exceptions/DatabaseException.class.php');
class Connection {

  private static $connection=null;
  private static $dbName="kleos";
  private  static  $serverName="localhost";
  private static $dbUsername="root";
  private static $dbPassword="";

  public static function getInstance() {
      if(self::$connection != null) {
          return self::$connection;
      }try{ 
        self::$connection= new PDO("mysql:host=".self::$serverName.";dbname=".self::$dbName,self::$dbUsername,self::$dbPassword);
        self::$connection -> exec("set names utf8");
        self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        throw new DatabaseException("erreur de connection a la base");
      }
      return self::$connection;
  }

}
?>