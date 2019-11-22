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
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password']; 
        $password1 = $_POST['password1']; 
        
        if(empty($correo) or empty($usuario) or empty($nombre) or empty($password) or empty($password1)){
          echo '<script>alert("El servidor dice que no todos los campos estan llenos");</script>'; //.= para concatenar
        } else if(!preg_match('/[a-z]+\d{3}@ikasle\.ehu\.(es|eus)/',$correo) && !preg_match('/[a-z]+(\.[a-z]+)?@ehu\.(es|eus)/', $correo)){
          echo '<script>alert("El servidor dice que el mail introducido es incorrecto");</script>';
        } else if($password != $password1){
          echo '<script>alert("El servidor dice que las contraseñas no coinciden");</script>';
        } else if(strlen($password) < 6){
          echo '<script>alert("El servidor dice que la contraseña no tiene un mínimo de 6 caracteres");</script>';
        } else {

            // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
           
         
          $sql = "INSERT INTO usuarios (usuario, correo, nombre, password) VALUES ('". $_POST["usuario"] ."', '". $_POST["correo"] ."', '". $_POST["nombre"] ."','". $_POST["password"] ."')";
          if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Usuario creado con éxito, redirigiendo...");parent.location = "Layout.php?correo='.$_POST['correo'].'"</script>';
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
      <h2>Introduzca los datos del registro:</h2>
 
      <form id='fquestion' name='fquestion' method='POST' action='SignUp.php'>
      <br />
      <br />
 
      Tipo de usuario: <select id="usuario" name="usuario"/>  
        <option value="alumno">Alumno</option>
        <option value="profesor">Profesor</option>
      </select> <br><br>
      Dirección de correo ehu asociada: <input type="text" id="correo" name="correo" /><div id="correDiv" style="color:red;"></div><div id="correoVip" style="color:red;"></div><br>
      Nombre y Apellido/s (Introduzca al menos dos palabras): <input type="text" id="nombre" name="nombre" /><div id="nombreDiv" style="color:red;"></div><br>
      Contraseña (min 6 caracteres): <input type="password" id="password" name="password" /><div id="correctaDiv" style="color:red;"></div><div id="passwordCorrecta" style="color:red;"></div><br>
      Repita la contraseña: <input type="password" id="password1" name="password1"/><div id="incorrecta1Div" style="color:red;"></div><br>

           
      <input id="submit" type="submit" disabled="disabled" value="Registrase" /></input> <img height=1 width=30/>
      
      </form>
 
    </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>