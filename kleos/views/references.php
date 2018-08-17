<?php 
 session_start();
 require_once(__DIR__."/../controllers/fillReferencesPage.php");
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
      <h1 class="text-center page_title">Nos Références</h1>  
      <div class="row">
      <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
       <p><i class="kk kk-Like" style="font-size:50px;margin:0px 15px 15px 0px;"></i> <b style="font-size:24px;color:#badc58;font-family:'Times New Roman', Times, serif;">Ces clients nous ont fait confiance ...</b></p>
       <div class="row line_of_references">
        <?php $i=0; foreach($references as $reference) { ?>
          <?php if($i %5 ==0) { echo "</div><div class='row line_of_references'>"; }?>
            <img  src=<?php echo "\"".$reference->url."\""; ?> alt=<?php echo "\"".$reference->alt."\""; ?>/>
          <?php $i++; } ?>
       </div> 
      </div>
      <div>
    </section>
  </div>
  <?php require_once(__DIR__."/../views/components/footer.html");?>
</body>
</html>