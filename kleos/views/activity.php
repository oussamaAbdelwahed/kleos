<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php require_once("components/include_scripts.php");?>
</head>
<body>
  <?php require_once(__DIR__."/../views/components/navbar.php");?>
  <section class="pages-section container">
    <h1 class="text-center page_title">Note offre de sevice</h1>
  </section>
  <?php require_once(__DIR__."/../views/components/footer.html");?>     
</body>
</html>