<?php session_start(); ?>
<?php
  setcookie("correo", "", -1000);
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <script>alert("Ha cerrado su sesión, redirigiendo...");parent.location = "Layout.php"</script>;
     
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>