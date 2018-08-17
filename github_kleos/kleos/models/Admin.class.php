<?php 
class Admin implements SerializableEntity{
   public $id;
   public $role;
   public $username;
   public $password;
   public $fullName;

   public function __construct(array $data) {
     $this->password="";
     $this->hydrate($data);
   }

   public function setId(int $id) {
       $this->id = $id;
   }

   public function setRole(string $role) {
       $this->role = $role;
   }

   public function setUsername(string $username) {
       $this->username = $username;
   }

   public function setPassword(string $password) {
      $this->password = $password;
   }

   public function setFullName(string $fullName){
       $this->fullName = $fullName;
   }

   public function hydrate(array $data) {
     foreach($data as $key=>$value) {
         $methodName = "set".ucfirst($key);
         if(method_exists($this,$methodName)) {
            $this->$methodName($value);
         }
     }
   }

  

   public static function getAll() {
     $admins = [];
     try{
        $connection =Connection::getInstance();
        $statement = $connection->query("SELECT * FROM admins");
        $tmp= $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($tmp as $value) 
          $admins[] = new Admin($value);
     }catch(PDOException $e) {
         throw new DatabaseException("error");
     }
     return $admins;
   }

   public static function find(int $id) {

   }

   public static function save(SerializableEntity $image) {
      
   }

   public static function update(SerializableEntity $admin) {
    $test=false;
    try{
      $connection= Connection::getInstance();
      $statement = $connection->prepare("UPDATE admins SET username=:username,fullName=:fullName WHERE id=:id");
      $statement->bindParam(":username",$admin->username);
      $statement->bindParam(":fullName",$admin->fullName);
      $statement->bindParam(":id",$admin->id);
      $test = $statement->execute();
    }catch(PDOException $e) {
        //die($e);
        throw new DatabaseException("erreur dans Contact");
    }
    return $test;
   }

   public static function delete(int $id) {

   }

   public static function authenticated(string $username,string $password) {
     $user = null;
     try{
       $connection = Connection::getInstance();
       $statement = $connection->prepare("SELECT id,role,username,fullName FROM admins WHERE username=:username AND password = :password");
       $statement->bindParam(":username",$username);
       $statement->bindParam(":password",$password);
       $res = $statement->execute();
       if($res) {
         $tab = $statement->fetch(PDO::FETCH_ASSOC);
         if($tab)
           $user = new Admin($tab);
       } 
    }catch(PDOException $e) {
         throw new DatabaseException("an error has been occured during login");
    }
     return $user;
   }

}
?>