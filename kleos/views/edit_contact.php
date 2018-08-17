<?php 
session_start(); 
if(isset($_SESSION["user"])) {
    require_once(__DIR__."/../controllers/fillContactPage.php");
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
        <form class="form-horizontal" method="POST" action=<?php echo "../controllers/UpdateContact.php?id=".$contact->id ?? ""; ?> >
           <div class="form-group">
              <label for="address"><i class="kk-icon-contact kk kk-Home1"></i></label>
              <input type="text" value=<?php echo "\"".$contact->address."\"" ?? ""; ?> class="form-control" name="address" id="address"/>
           </div>
           <div class="form-group">
              <label for="tel"><i class="kk-icon-contact kk kk-Phone"></i></label>
              <input type="text" value=<?php echo "\"".$contact->tel."\"" ?? ""; ?> class="form-control" name="tel" id="tel"/>
           </div>
           <div class="form-group">
              <label for="fax"><i class="kk-icon-contact kk kk-fax"></i></label>
               <input type="text" value=<?php echo "\"".$contact->fax."\"" ?? ""; ?> class="form-control" name="fax" id="fax"/>
           </div>
           <div class="form-group">
              <label for="email"><i class="kk-icon-contact kk kk-Email"></i></label>
              <input type="email" value=<?php echo "\"".$contact->email."\"" ?? ""; ?> class="form-control" name="email" id="email"/>
           </div>
           <div class="form-group">
              <label for="website"><i class="kk-icon-contact kk kk-internet"></i></label>
               <input type="text" value=<?php echo "\"".$contact->website."\"" ?? ""; ?> class="form-control" name="website" id="website"/>
           </div>    
           <div class="form-group">
             <input type="submit"  value="enregistrer" class="btn btn-success"/>
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