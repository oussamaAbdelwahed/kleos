<?php
class Contact implements SerializableEntity{
   public $id;
   public $address;
   public $tel;
   public $fax;
   public $email;
   public $website;

   public function __construct(array $data) {
     $this->hydrate($data);
   }

   public function hydrate(array $data) {
       foreach($data as $key=>$value) {
         $methodName="set".ucfirst($key);
         if(method_exists($this,$methodName)) 
            $this->$methodName($value);
       } 
   }

   public function setId(int $id) {
       $this->id = $id;
   }

   public function setAddress(string $address) {
     $this->address = $address;
   }

   public function setTel(string $tel){
       $this->tel = $tel;
   }

   public function setFax(string $fax){
       $this->fax= $fax;
   }

   public function setEmail(string $email) {
       $this->email = $email;
   }

   public function setWebsite(string $website) {
       $this->website = $website;
   }

   public static function getAll() {
    $infos = []; 
    try{
       $connection = Connection::getInstance();
       $statement = $connection->query("SELECT * FROM infos");
       $tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
       foreach ($tmp as $value) {
           $infos[] = new Contact($value);
       }
    }catch(PDOException $e) {
       throw new DatabaseException("erreur dans contact");
    }
    return $infos;
   }

   public static function find(int $id) {
     $info = null;
     try{
       $connection = Connection::getInstance();
       $statement = $connection->prepare("SELECT * FROM infos WHERE id = :id");
       $statement->bindParam(":id",$id);
       $res = $statement->execute();
       $info = new Contact($statement->fetch(PDO::FETCH_ASSOC));
     }catch(PDOException $e) {
        throw new DatabaseException("erreur dans contact"); 
     }
     return $info;
   }

   public static function save(SerializableEntity $contact) {
      
   }

   public static function update(SerializableEntity $contact) {
    $test=false;
    try{
      $connection= Connection::getInstance();
      $statement = $connection->prepare("UPDATE infos SET address=:address,tel=:tel,fax=:fax,email=:email,website=:website WHERE id = :id");
      $statement->bindParam(":address",$contact->address);
      $statement->bindParam(":tel",$contact->tel);
      $statement->bindParam(":fax",$contact->fax);
      $statement->bindParam(":email",$contact->email);
      $statement->bindParam(":website",$contact->website);
      $statement->bindParam(":id",$contact->id);
      $test = $statement->execute();
    }catch(PDOException $e) {
        die($e);
        throw new DatabaseException("erreur dans Contact");
    }
    return $test;
   }

   public static function delete(int $id) {

   }
}
?>


