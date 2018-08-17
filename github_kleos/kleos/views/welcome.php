<?php 
session_start();
require_once(__DIR__."/../controllers/fillCarousel.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once("components/include_scripts.php");?>
  <style type="text/css">
    footer {
        position: relative;
        top:100%;
        margin:0px;
        left:0px;
        background-color: #181818;
        height: 200px;
        width:100%;
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: center;
    }
   </style>
</head>
<body>
  <?php require_once(__DIR__."/../views/components/navbar.php");?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $i=0; 
          foreach($results as $result) {
          if($i==0) {?>
            <div class="item active">
              <img class="img-item-carr" src=<?php echo "\"".$result['url']."\"";?> alt="Los Angeles">
              <div class="desc-carrousel-img">
                   <p class="text-desc-carousel"><i class="kk kk-star "></i> <?php echo $result['description']; ?></p>
              </div>
            </div>
        <?php } else { ?>
         <div class="item">
            <img class="img-item-carr" src=<?php echo "\"".$result['url']."\"";?> alt="Los Angeles">
            <div class="desc-carrousel-img">
                <p class="text-desc-carousel"><i class="kk kk-star"></i> <?php echo $result['description']; ?></p>
            </div>  
         </div> 
        <?php }
              $i++;
         } ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="kk kk-Chevron-Heavy-Left" style="font-size:35px;"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <i class="kk kk-Chevron-Heavy-Right"  style="font-size:35px;"></i>
        <span class="sr-only">Next</span>
    </a>
 </div>
 <section id="welcomesection" class="col-xs-12 col-lg-12">
   <div class="row container">
       <h2 class="text-center" style="color:black;font-family:arial;margin-bottom:70px;">Informations Societé</h2>
       <div class="col-xs-6 col-lg-6">
         <img src="../images/description.png" alt="description societe"/>
       </div>
       <div class="col-xs-6 col-lg-6">
         <img src="../images/adressmap.png" alt="adresse exacte societe(google maps)"/>
       </div>
   </div>
 </section>
 <?php require_once(__DIR__."/components/footer.html");?>
</body>
</html>