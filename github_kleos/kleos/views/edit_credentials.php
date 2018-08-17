<?php 
session_start(); 
if(isset($_SESSION["user"])) {
 ?>
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
  <?php require_once(__DIR__."/../views/components/side-navbar.php"); ?>
  <section class="pages-section container">
    <h1 class="text-center page_title">Modifier Les Coordonnées </h1>
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-xs-12">
        <form style="margin-bottom:200px;" class="form-horizontal" method="POST" action=<?php echo "../controllers/UpdateCredentials.php?id=".$_SESSION["user"]["id"] ?? ""; ?> >
           <div class="form-group">
               <label for="username"><b>username :</b></label>
               <input type="text" value=<?php echo "\"".$_SESSION["user"]["username"]."\""; ?> id="username"  name="username" class="form-control"/>
           </div>   
           <div class="form-group">
               <label for="fullName"><b>Nom Complet :</b></label>
               <input type="text" value=<?php echo "\"".$_SESSION["user"]["fullName"]."\""; ?> id="fullName" name="fullName" class="form-control"/>
           </div>        
           <div class="form-group">
               <input type="submit" value="enregistrer" class="btn btn-success"/>
           </div>               
        </form>
     </div>
    </div>
  </section>
  <?php require_once(__DIR__."/../views/components/footer.html");?>  
  <?php require_once(__DIR__."/../views/components/aside-navbar-scripts.php");?>  
</body>
</html>
<?php
} else {
 header("Location: http://localhost/kleos/views/login.php?p=login");  
}
?>