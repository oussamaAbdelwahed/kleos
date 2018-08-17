 <?php 
  require_once("../utils/ActiveLinkTrait.php");
  use Traits\ActiveLink;
  $page="";
  if(isset($_GET["p"]) && !empty($_GET["p"])) 
     $page = $_GET["p"];
  
  ActiveLink::activate($page);
?>
 <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <a href="#"><img style="margin-right:2px;border-right:solid 1px black;" alt="logo" src="http://www.kleos.tn/images/logo_kleos.png"/></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class=<?php echo ActiveLink::$links["welcome"] ? "active" : ""; ?> ><a href="welcome.php?p=welcome">Acceuil</a></li>
              <li class=<?php echo ActiveLink::$links["about"] ? "active" : ""; ?> ><a href="about.php?p=about">A propos</a></li>
              <li class=<?php echo ActiveLink::$links["activity"] ? "active" : ""; ?> ><a href="activity.php?p=activity">Notre activité</a></li>
              <li class=<?php echo ActiveLink::$links["partners"] ? "active" : ""; ?> ><a href="partners.php?p=partners">Partenaires</a></li>
              <li class=<?php echo ActiveLink::$links["references"] ? "active" : ""; ?> ><a href="references.php?p=references">Références</a></li>  
              <li class=<?php echo ActiveLink::$links["contact"] ? "active" : ""; ?> ><a href="contact.php?p=contact">Contact</a></li>
              <?php if(isset($_SESSION["user"])) { ?>
                <li class=<?php echo ActiveLink::$links["dashboard"] ? "active" : ""; ?> ><a href="dashboard.php?p=dashboard">Dashboard</a></li> 
                <li><a href="#menu-toggle" style="color:black;"  id="menu-toggle" > Menu <i class="kk kk-menu"></i></a></li>
              <?php }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <?php if(!isset($_SESSION["user"])) { ?>
                  <li class=<?php echo ActiveLink::$links["login"] ? "active" : ""; ?> ><a href="login.php?p=login">Login</a></li>
               <?php } else {?>
                  <li><a href="../controllers/logoutController.php">Logout</a></li>
               <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
</nav>
