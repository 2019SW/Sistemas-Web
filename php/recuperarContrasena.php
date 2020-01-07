<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/validateAjax.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include 'DbConfig.php'?>
  <?php
  if (isset($_POST['correo']) && isset($_SESSION['code']) && isset($_SESSION['correo'])){

        $code = $_SESSION['code'];
        $email = $_SESSION['correo'];
        $codigo = $_POST['codigo'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if(empty($correo) or empty($codigo) or empty($password) or empty($password1)){
          echo '<script>alert("El servidor dice que no todos los campos estan llenos");</script>'; //.= para concatenar
        } else if(!preg_match('/[a-z]+\d{3}@ikasle\.ehu\.(es|eus)/',$correo) && !preg_match('/[a-z]+(\.[a-z]+)?@ehu\.(es|eus)/', $correo)){
          echo '<script>alert("El servidor dice que el mail introducido no tiene un formato correcto");</script>';
        } else if($password != $password1){
          echo '<script>alert("El servidor dice que las contraseñas no coinciden");</script>';
        } else if(strlen($password) < 6){
          echo '<script>alert("El servidor dice que la contraseña no tiene un mínimo de 6 caracteres");</script>';
        } else if($code!=$codigo){
          echo '<script>alert("El servidor dice que el código no es correcto");</script>';
        } else if($email!=$correo){
          echo '<script>alert("El servidor dice que el email no es el correcto");</script>';
        }else{
          // Hashing password

          $password = password_hash($password, PASSWORD_DEFAULT);

          // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "UPDATE usuarios SET password=";
          $sql .= "'$password'";
          $sql .= " WHERE correo LIKE ";
          $sql .= "'$correo'";

          if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Clave modificada con éxito, redirigiendo...");parent.location = "Layout.php?correo='.$_POST['correo'].'"</script>';
          } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
        }

  }

  ?>

  <section class="main" id="s1">
    <div>

      <br />
      <h2>Introduzca los datos solicitados para continuar con el cambio de contraseña:</h2>

      <form id='fquestion' name='fquestion' method='POST' action='recuperarContrasena.php'>
      <br />
      <br />

      Dirección de correo ehu asociada: <input type="text" id="correo" name="correo" /><div id="correDiv" style="color:red;"></div><div id="correoVipp" style="color:red;"></div><br>
      Contraseña (min 6 caracteres): <input type="password" id="password" name="password" /><div id="correctaDiv" style="color:red;"></div><div id="passwordCorrecta" style="color:red;"></div><br>
      Repita la contraseña: <input type="password" id="password1" name="password1"/><div id="incorrecta1Div" style="color:red;"></div><br>
      Código de recuperación: <input type="text" id="codigo" name="codigo"/><div id="incorrecta1Div" style="color:red;"></div><br>


      <input id="submit" type="submit" value="Cambiar contraseña" /></input> <img height=1 width=30/>

      </form>

    </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>
