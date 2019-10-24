<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <?php include 'DbConfig.php'?>
    <?php
        $correo = $_POST['correo'];
        $enunciado = $_POST['enunciado'];
        $incorrecta1 = $_POST['incorrecta1'];
        $incorrecta2 = $_POST['incorrecta2']; 
        $incorrecta3 = $_POST['incorrecta3']; 
        $correcta = $_POST['correcta'];
        $tema = $_POST['tema'];

        if(empty($correo) or empty($enunciado) or empty($incorrecta1) or empty($incorrecta2) or empty($incorrecta3) or empty($correcta) or empty($tema)){
          $error = "No todos los campos están llenos"; //.= para concatenar
        } else if(!preg_match('/[a-z]+\d{3}@ikasle\.ehu\.(es|eus)/',$correo) && !preg_match('/[a-z]+(\.[a-z]+)?@ehu\.(es|eus)/', $correo)){
          $error = "El email introducido es incorrecto";
        } else if(strlen($enunciado) < 10){
          $error = "El enunciado ha de ser de un mínimo de 10 carácteres";
        } else {

            // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
           
         
          $sql = "INSERT INTO preguntas (correo, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, complejidad, tema) VALUES ('". $_POST["correo"] ."', '". $_POST["enunciado"] ."', '". $_POST["correcta"] ."', '". $_POST["incorrecta1"] ."', '". $_POST["incorrecta2"] ."', '". $_POST["incorrecta3"] ."', '". $_POST["complejidad"] ."', '". $_POST["tema"] ."')";
          if (mysqli_query($conn, $sql)) {
                echo "Pregunta añadida con éxito. Puede ver las preguntas existentes en el siguiente link: ";
                      echo"<br><a href='ShowQuestions.php?correo=".$_GET["correo"]."'>Ver entradas</a>";
          } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
        }
      ?>
      </div>
      
      <?php
      if(isset($error))
      {
        ?>
        <div id="ErrorMsgs"><?php echo $error; ?></div>
        <?php
      }
      ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>