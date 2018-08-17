<?php 
interface SerializableEntity {
 public function hydrate(array $data);
 public static function getAll();
 public static function find(int $id);
 public static function save(SerializableEntity $object);
 public static function update(SerializableEntity $object);
 public static function delete(int $id);
}
?>