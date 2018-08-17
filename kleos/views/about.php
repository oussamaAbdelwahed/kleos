<?php
session_start();
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
  <div class="container">
  <section class="pages-section container">
    <h1 class="text-center page_title">Qui Somme Nous ?</h1>
    <table style="margin-bottom:70px;">
      <?php foreach($images as $image) { ?>
      <tr>
        <td><img class="image_table_about" alt=<?php echo "\"".$image->alt."\"";?> src=<?php echo "\"".$image->url."\"";?>/></td>
        <td class="td_paragraphe_table_about">
           <h4 style="margin-bottom:25px;color:black;"><?php echo $image->alt;?></h4>
           <p class="paragraphe_table_about"><?php echo $image->description;?> </p>
        </td>
      </tr>
      <?php } ?>
      <tr>
         <td><a href="http://www.kleos.tn/pdf/presentation-kleos.pdf" target="_blank"><img class="image_table_about" alt="pdf link" src="../images/pdf.png"/></a></td>
         <td class="td_paragraphe_table_about">
            <h4 style="margin-bottom:25px;color:black;">PRESENTATION DE LA SOCIETE</h4>
            <img alt="description de la sociéte" src="../images/presentation-kleos.png"/>
         </td>
      </tr>
    </table>
  </section>
  </div>
  <?php require_once(__DIR__."/../views/components/footer.html");?>
</body>
</html>