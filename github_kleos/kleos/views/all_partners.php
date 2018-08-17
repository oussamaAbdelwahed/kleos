<?php 
session_start(); 
if(isset($_SESSION["user"])) {
    require_once(__DIR__."/../controllers/fillPartnersPage.php");
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
     <h1 class="text-center page_title">Tous Les Partenaires </h1>
    
    <div class="row">
     <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-xs-12">
      <a href="add_partner.php" style="margin-bottom:25px;" class="btn btn-primary"> <i class="kk kk-plus"></i> Ajouter Un Partenaire</a>
      <?php foreach($partners as $key=>$partner) { ?>
         <div class="panel panel-default">
             <div class="panel-heading">
                <h4 class="text-center">partenaire : &lt;&lt; <b><?php echo $partner->alt; ?></b> &gt;&gt; </h4>
             </div>
             <div class="panel-body">
                <b>logo partenaire :</b><br>
                <img style="margin-bottom:20px;border:solid 1px black;height:150px;width:150px;" src=<?php echo $partner->url; ?>  alt=<?php echo $partner->alt; ?> /><br/>   
                <b>ajouté le :</b><br>
                <small> <?php echo $partner->createdAt; ?> </small>
             </div>
             <div class="panel-footer">
                <a href=<?php echo "edit_partner.php?id=".$partner->id; ?> class="btn btn-warning">modifier</a>
                <a href=<?php echo "http://localhost/kleos/controllers/DeleteUpdatePartner.php?id=".$partner->id."&fn=../images/partners/".substr($partner->url,strrpos($partner->url,"/")+1); ?> class="btn btn-danger">supprimer</a>
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