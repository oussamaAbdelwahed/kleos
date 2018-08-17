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
   <style type="text/css">
     tr {
       line-height:40px;
     }table{
       margin-bottom:25px;
     } .info_content{
       margin-left:30px;
     }
  </style>
</head>
<body>
  <?php require_once(__DIR__."/../views/components/navbar.php");?>
  <?php require_once(__DIR__."/../views/components/side-navbar.php"); ?>
  <section class="pages-section container">
    <h1 class="text-center page_title"> Admin Dashsboard</h1>
    
    <div class="row">
       <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
         <div class="jumbotron">
           <h3 style="color:#0984e3;margin-bottom:20px;" class="text-center">Mes Informations</h3>
           <table>
             <tr>
               <td><b>Role : </b></td>
               <td><b class="info_content"><?php echo $_SESSION["user"]["role"]; ?></b></td>
             </tr>
             <tr>
               <td><b>Nom d'utilisateur : </b></td>
               <td><b class="info_content"> <?php echo $_SESSION["user"]["username"]; ?></b></td>
             </tr>     
             <tr>
               <td><b>Nom complet : </b></td>
               <td><b class="info_content"><?php echo $_SESSION["user"]["fullName"];  ?></b></td>
             </tr>                        
           </table>
           <a href="edit_credentials.php" class="btn btn-success">modifier</a>
         </div>
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