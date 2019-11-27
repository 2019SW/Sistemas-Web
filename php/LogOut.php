<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
 
        <?php
          setcookie("correo", "", -1000);
          session_destroy();
        ?>
      <script>alert("Ha cerrado su sesión, redirigiendo...");parent.location = "Layout.php"</script>;
     
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>