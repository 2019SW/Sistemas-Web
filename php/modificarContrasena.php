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
  if (isset($_POST['correo'])){

        $correo = $_POST['correo'];


          // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT correo FROM usuarios WHERE correo='$correo'";
          if ($r = mysqli_query($conn, $sql)) {


				$row=array();
                $row1=mysqli_fetch_assoc($r);

				if (empty($row1['correo'])) echo '<script>alert("No existe un usuario con ese correo");</script>';
				else{

					$to = $correo;
					$subject = "Recuperación de contraseña";
					$codigo = rand(10000,99999);

					$_SESSION['code']=$codigo;
					$_SESSION['correo']=$correo;

					$message="
					<html>
					<head>
					<title> Recuperación de contraseña </title>
					</head>
					<body>
					<h3>Pasos a seguir para la recuperación de la contraseña</h3>
					<ol>
						<li>Pinchar en el link proporcionado.</li>
						<li>Introducir el código proporcionado y la nueva contraseña.</li>
						<li>En caso de éxito será notificado por la página y la contraseña se habrá modificado.</li>
					</ol>
					<h3>Link a la página de recuperación</h3>
					<h2><a href='https://intento-9.000webhostapp.com/ProyectoFinal/php/recuperarContrasena.php?email="."$correo"."' id='layout'>Aquí</a></h2>
					<h3>Código de recuperación:</h3>
					<h2>".$codigo."</h2>
					</body>
					</html>
					";

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: noreply @ quiz . com';

					mail($to, $subject, $message, $headers);
				}
                echo '<script>alert("El email se ha enviado correctamente, es posible que sea tratado como spam. Redirigiendo a página principal...");parent.location = "Layout.php?correo='.$_POST['correo'].'"</script>';
          } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);

  }

  ?>

  <section class="main" id="s1">
    <div>

      <br />
      <h2>Introduzca el email asociado a la cuenta cuya contraseña desea modificar:</h2>

      <form id='fquestion' name='fquestion' method='POST' action='modificarContrasena.php'>
      <br />
      <br />

      Dirección de correo ehu asociada: <input type="text" id="correo" name="correo" /><div id="correDiv" style="color:red;"></div><div id="correoVipp" style="color:red;"></div><br>

      <input id="submit" type="submit" value="Recuperar Contraseña" /></input> <img height=1 width=30/>

      </form>

    </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>
