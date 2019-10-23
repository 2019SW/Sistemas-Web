<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include 'DbConfig.php'?>
  <?php 
  if (isset($_POST['correo'])){

        $correo = $_POST['correo'];
        $password = $_POST['password']; 
      
        // Create connection
        $conn = mysqli_connect($server, $user, $pass, $basededatos);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
           
         
        $sql = "SELECT password FROM usuarios WHERE correo='$correo'";
        if ($r = mysqli_query($conn, $sql)) {

                  $row=array();
                  $row1=mysqli_fetch_assoc($r);
                  if (empty($row1['password'])) echo '<script>alert("No existe un usuario con ese correo");</script>';
                  else if ($password != $row1['password']) echo '<script>alert("Contraseña Incorrecta");</script>';  //Associative Array
                  else {

                    echo '<script>alert("Bienvenido de nuevo, redirigiendo...");parent.location = "Layout.php?correo='.$correo.'"</script>';
          
                  }
 
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }


  ?>
  <section class="main" id="s1">
    <div>
 
      <br />
      <h2>Introduzca su correo y contraseña:</h2>
 
      <form id='fquestion' name='fquestion' method='POST' action='LogIn.php'>
      <br />
      <br />
 
      Dirección de correo ehu: <input type="text" id="correo" name="correo" /><div id="correDiv" style="color:red;"></div><br>
      Contraseña (min 6 caracteres): <input type="password" id="correcta" name="password" /><div id="correctaDiv" style="color:red;"></div><br>
           
      <input id="submit" type="submit" value="Iniciar sesión" /></input> <img height=1 width=30/>
      
      </form>
 
    </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>