<?php 
class Image implements SerializableEntity {
   public $id;
   public $alt;
   public $type;
   public $extension;
   public $url;
   public $description;
   public $createdAt;

   public function __construct(array $data) {
     $this->hydrate($data);
   }

   public function setId(int $id) {
       $this->id = $id;
   }

   public function setType(string $type) {
       $this->type = $type;
   }

   public function setAlt(string $alt) {
       $this->alt = $alt;
   }

   public function setExtension(string $ext) {
       $this->extension = $ext;
   }

   public function setUrl(string $url) {
       $this->url = $url;
   }

   public function setDescription(string $desc) {
       $this->description = $desc;
   }

   public function setCreatedAt($createdAt) {
       $this->createdAt = $createdAt; 
   }

   public function hydrate(array $data) {
     foreach ($data as $key => $value) {
         $methodName="set".ucfirst($key);
         if(method_exists($this,$methodName)) {
             $this->$methodName($value);
         }
     }
   }

   public static function getAll() {
     $images=[];
     try{
       $connection = Connection::getInstance();
       $statement = $connection->query("SELECT * FROM images");
       $tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
       foreach ($tmp as  $value) {
           $images [] = new Image($value);
       }
     }catch(PDOException $e){
         throw new DatabaseException("in getAll");
     }
     return $images;
   }

   public static function getByType(string $type) {
     $images=[];
     try{
      $connection = Connection::getInstance();    
       $statement = $connection->prepare("SELECT * FROM images WHERE type=:type");
       $statement->bindParam(":type",$type);
       $res = $statement->execute();
       $tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
       foreach($tmp as $image) {
           $images[] = new Image($image);
       }
     }catch(PDOException $e){
        throw new DatabaseException("in getAll");
     }
     return $images;
   }

   public static function find(int $id) {
    $image = null;
    try{
      $connection = Connection::getInstance();
      $statement = $connection->prepare("SELECT * FROM images WHERE id = :id");
      $statement->bindParam(":id",$id);
      $statement->execute();
      $image = $statement->fetch(PDO::FETCH_ASSOC);  
      $image = new Image($image);         
    }catch(PDOException $e) {
      throw new DatabaseException("erreur dans save image"); 
    }
    return $image; 
   }

   public static function save(SerializableEntity $image) {
     $test =false;
     try{
        $connection = Connection::getInstance();
        $statement = $connection->prepare("INSERT INTO images(alt,type,extension,url,description,createdAt) VALUES(:alt,:type,:extension,:url,:description,:createdAt)");
        
        $statement->bindParam(":alt",$image->alt);
        $statement->bindParam(":type",$image->type);
        $statement->bindParam(":extension",$image->extension);
        $statement->bindParam(":url",$image->url); 
        $statement->bindParam(":description",$image->description);
        $statement->bindParam(":createdAt",$image->createdAt); 

        $test = $statement->execute();             
    }catch(PDOException $e) {
         throw new DatabaseException("erreur dans save image"); 
    }
     return $test;
   }

   public static function update(SerializableEntity $image) {
     $test =false;
     try{
        $connection = Connection::getInstance();
        $statement = $connection->prepare("UPDATE images SET alt=:alt,description=:description,url=:url WHERE id = :id");
        $statement->bindParam(":alt",$image->alt);
        $statement->bindParam(":description",$image->description);
        $statement->bindParam(":url",$image->url);
        $statement->bindParam(":id",$image->id);
        $test = $statement->execute();             
      }catch(PDOException $e) {
         throw new DatabaseException("erreur dans update image"); 
      }
      return $test;
   }

   public static function delete(int $id) {
     $test =false;
     try{
        $connection = Connection::getInstance();
        $statement = $connection->prepare("DELETE FROM images WHERE id = :id");
        $statement->bindParam(":id",$id);
        $test = $statement->execute();             
    }catch(PDOException $e) {
         throw new DatabaseException("erreur dans delete image"); 
    }
     return $test;
   }
}
?>