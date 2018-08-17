<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
   <?php require_once("components/include_scripts.php");?>
</head>
<body>
  <?php require_once(__DIR__."/../views/components/navbar.php");?>
  <div class="container">
  <section class="pages-section container">
    <h1 class="text-center page_title">Se Connecter </h1>
    <div class="row">
      <form id="form-login" class="form-horizontal col-xs-offset-1 col-xs-10 col-xs-offset-1 col-lg-offset-3 col-lg-6 col-lg-offset-3" method="POST" action="../controllers/LoginController.php">
          <div class="form-group">
            <label for="username"><b>Username</b> <i class="kk kk-Lead-Pencil"></i></label>
            <input class="form-control" type="text" name="username" id="username"/>
          </div>
          <div class="form-group">
            <label for="password"><b>Password</b> <i class="kk kk-key"></i></label>
            <input class="form-control" type="password" name="password" id="password"/>
          </div>  
          <div class="form-group">
            <input class="btn btn-success" type="submit" value="Se Connecter"/> 
          </div>
          <div class="form-group">
            <p class="text-danger"><?php echo $_SESSION["error_message"] ?? "";$_SESSION["error_message"]=""; ?></p>
          </div>        
      </form>
     </div>
  </section>
  </div>
  <?php require_once(__DIR__."/../views/components/footer.html");?>
</body>
</html>