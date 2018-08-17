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
    <h1 class="text-center page_title">Ajouter Une Section </h1>
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-xs-12">
        <form class="form-horizontal" method="POST" action="../controllers/fillAboutPage.php" enctype="multipart/form-data">
          <div class="form-group">
             <label for="titre"><b>titre : </b></label>
             <input required type="text" name="titre" id="titre" class="form-control"/>
          </div>
          <div class="form-group">
             <label for="description"><b>description : </b></label>
             <textarea required rows="14" class="form-control" name="description" id="description"></textarea>
          </div> 
          <div class="form-group">
             <label for="image"><b><i class="kk kk-open-folder2"></i> image : </b></label>
             <input required type="file" id="image" name="image" />
          </div>
          <div class="form-group">
              <input  type="submit" class="btn btn-primary" value="enregistrer"/>
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