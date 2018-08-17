<?php 
session_start(); 
if(isset($_SESSION["user"])) {
    require_once(__DIR__."/../controllers/fillAboutPage.php");
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
     <h1 class="text-center page_title">Tous Les Sections </h1>
    
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-xs-12">
      <a href="add_about_section.php" style="margin-bottom:25px;" class="btn btn-primary"> <i class="kk kk-plus"></i> Ajouter Une Section</a>
      <?php foreach($images as $key=>$image) { ?>
         <div class="panel panel-default">
             <div class="panel-heading">
                <h4 class="text-center">Element : &lt;&lt; <b><?php echo $image->alt; ?></b> &gt;&gt; </h4>
             </div>
             <div class="panel-body">
                <b>l'image :</b><br>
                <img style="margin-bottom:20px;border:solid 1px black;" src=<?php echo $image->url; ?> height="150" width:"150" alt=<?php echo $image->alt; ?> /><br/>
                <b>description :</b><br> 
                <p> <?php echo $image->description; ?> </p> 
                <b>ajouté le :</b><br>
                <small> <?php echo $image->createdAt; ?> </small>
             </div>
             <div class="panel-footer">
                <a href=<?php echo "edit_about_section.php?id=".$image->id; ?> class="btn btn-warning">modifier</a>
                <a href=<?php echo "http://localhost/kleos/controllers/DeleteUpdateAboutSection.php?id=".$image->id."&fn=../images/".substr($image->url,strrpos($image->url,"/")+1); ?> class="btn btn-danger">supprimer</a>
             </div>
         </div>   
       <?php } ?>
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