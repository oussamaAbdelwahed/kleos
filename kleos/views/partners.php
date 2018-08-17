<?php 
session_start();
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
  <div class="container">   
    <section class="pages-section container">    
      <h1 class="text-center page_title">Nos Partenaires</h1>
      <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
       <div class="row line_of_partners">
        <?php $i=0; foreach($partners as $partner) { ?>
          <?php if($i %3 ==0) { echo "</div><div class='row line_of_partners'>"; }?>
            <img class="img_partner" src=<?php echo "\"".$partner->url."\""; ?> alt=<?php echo "\"".$partner->alt."\""; ?>/>
          <?php $i++; } ?>
       </div> 
      </div>
    </section>  
  </div>  
  <?php require_once(__DIR__."/../views/components/footer.html");?>
</body>
</html>