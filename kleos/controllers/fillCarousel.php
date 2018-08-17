<?php
require_once(__DIR__.'/../views/components/Connection.class.php');
$results=[];
try {
    $connection = Connection::getInstance();
    $results = $connection->query("SELECT * FROM images WHERE type='CARROUSEL'");
}catch(DatabaseException $e) {
    die("<h1>Erreur survenu ! actualisez la page</h1>"); 
}
?>