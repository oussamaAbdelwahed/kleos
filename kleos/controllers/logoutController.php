<?php 
session_start();
session_unset();
unset($_SESSION["user"]);
session_destroy(); 
header("Location: http://localhost/kleos/views/login.php?p=login");
?>