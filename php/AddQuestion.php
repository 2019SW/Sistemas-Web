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
				$servername = "localhost";
				$database = "quiz";
				$username = "root";
				$password = "";
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $database);
				// Check connection
				if (!$conn) {
     				die("Connection failed: " . mysqli_connect_error());
				}
				 
				echo "Connected successfully\n";
				
				$sql = "INSERT INTO preguntas (correo, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, complejidad, tema) VALUES ('". $_POST["correo"] ."', '". $_POST["enunciado"] ."', '". $_POST["correcta"] ."', '". $_POST["incorrecta1"] ."', '". $_POST["incorrecta2"] ."', '". $_POST["incorrecta3"] ."', '". $_POST["complejidad"] ."', '". $_POST["tema"] ."')";
				if (mysqli_query($conn, $sql)) {
				      echo "New record created successfully";
							echo"<br><a href='ShowQuestions.php'>Ver entradas</a>";
				} else {
				      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
				?>
				

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>