<?php
  require_once "config.php";

  $loginURL = $gClient->createAuthUrl();
 ?>
<?php include 'DbConfig.php'?>

<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  </head>
<body>
  <?php include '../php/Menus.php' ?>
  <div class="container" style="margin-top: 100px">
    <div class="col-md-6 col-offset-3" align="center">
      <form>
        Haciendo Click en el siguiente botón será redirigido a una página donde podrá
        loguearse en la página utilizando una cuenta de Google: <br><br>
        <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In with Google" class="btn btn-danger">
      </form>

  <?php include '../html/Footer.html' ?>
</body>
</html>
