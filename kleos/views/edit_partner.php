<?php 
session_start(); 
if(isset($_SESSION["user"])) {
   if(isset($_GET["id"]) && ctype_digit($_GET["id"])) {
     require_once(__DIR__."/../views/components/Connection.class.php");
     require_once(__DIR__."/../models/SerializableEntity.interface.php");
     require_once(__DIR__."/../models/Image.class.php");        
     $image = Image::find((int)$_GET["id"]);
     if($image) {
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
    <h1 class="text-center page_title">Modifier Un Partenaire </h1>
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-xs-12">
        <form class="form-horizontal" method="POST" action=<?php echo "../controllers/DeleteUpdatePartner.php?id=".$_GET["id"]; ?> enctype="multipart/form-data">
          <div class="form-group" >
            <b>logo du partenaire</b><br>
            <img style="border:solid 1px black;" height="100" width="100" src=<?php echo $image->url; ?> />
          </div>
          <div class="form-group">
             <label for="titre"><b>partenaire : </b></label>
             <input required type="text" value=<?php echo "\"".$image->alt."\""; ?> name="titre" id="titre" class="form-control"/>
          </div>
          <div class="form-group">
             <label for="partner_logo"><b><i class="kk kk-open-folder2"></i> changer l'image : </b></label>
             <input type="file" id="partner_logo" name="partner_logo" />
          </div>
          <input type="hidden" name="url" value=<?php echo $image->url; ?> />
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
}else{
  header("Location: http://localhost/kleos/views/all_about_sections.php");
}
}else{
  header("Location: http://localhost/kleos/views/all_about_sections.php");
}
} else {
 header("Location: http://localhost/kleos/views/login.php?p=login");  
}
?>