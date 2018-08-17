<?php
session_start();
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
    <style type="text/css">
      tr {
       line-height:50px;
      }
    </style>
</head>
<body>
  <?php require_once(__DIR__."/../views/components/navbar.php");?>  
  <div class="container"> 
   <section class="pages-section container">   
     <h1 class="text-center page_title" style="margin:30px 0px 90px 0px;">Contactez nous</h1>
     <div class="row">
       <div class="col-xs-12 col-lg-6">
         <div class="row">
           <table>
            <tr>
              <td><i class="kk-icon-contact kk kk-Home1"></i></td>
              <td><b><?php echo $contact->address ?? "Rue 8300, Immeuble Luxor 2 App. B-3-2 1073 MontPlaisir Tunis Tunisie ";?></b></td>
            </tr>
            <tr>
              <td><i class="kk-icon-contact kk kk-Phone"></i></td>
              <td><b><?php echo  $contact->tel ?? "+216 71 905 403";?></b></td>
            </tr>    
            <tr>
              <td><i class="kk-icon-contact kk kk-fax"></i></td>
              <td><b><?php echo  $contact->fax ?? "+216 71 905 404";?></b></td>
            </tr>       
            <tr>
              <td><i class="kk-icon-contact kk kk-Email"></i></td>
              <td><b><a href=<?php echo "mailto:".$contact->email ?? "sales@kleos.tn"; ?> ><?php echo $contact->email ?? "sales@kleos.tn";?></a></b></td>
            </tr>  
            <tr>
              <td><i class="kk-icon-contact kk kk-internet"></i></td>
              <td><b><a target="_blank" href=<?php echo "http://".$contact->website ?? "http://www.kleos.tn";?> > <?php echo $contact->website ?? "www.kleos.tn";?></a></b></td>
            </tr>  
            <tr>
              <td><i class="kk-icon-contact kk kk-facebook"></i></td>
              <td><b><a href="https://www.facebook.com/www.kleos.tn/" target="_blank">page facebook</a></b></td>
            </tr>                                                  
           </table>
         </div>
       </div>
       <div class="col-xs-12 col-lg-6" style="margin-bottom:60px;">
         <img class="pull-right" alt="adresse avec google maps" src="../images/adressmap.png"/>
       </div>
     </div>
   </section>
  </div>
   <?php require_once(__DIR__."/../views/components/footer.html");?>
</body>
</html>