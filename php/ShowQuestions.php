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
                                
                $sql = "SELECT * FROM preguntas";
                if ($r = mysqli_query($conn, $sql)) {
                    $resultset=array();  //Associative Array
                    echo "<div id='table'><center><table border=1>
                        <tr>
                        <th>Correo</th><th>Enunciado</th><th>Correcta</th><th>Incorrecta1</th><th>Incorrecta2</th><th>Incorrecta3</th><th>Complejidad</th><th>Tema</th>
                        <tr>
                        </tr></center>";    
                        while($row=mysqli_fetch_assoc($r))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['correo'] . "</td>";
                            echo "<td>" . $row['enunciado'] . "</td>";
                            echo "<td>" . $row['correcta'] . "</td>";
                            echo "<td>" . $row['incorrecta1'] . "</td>";
                            echo "<td>" . $row['incorrecta2'] . "</td>";
                            echo "<td>" . $row['incorrecta3'] . "</td>";
                            echo "<td>" . $row['complejidad'] . "</td>";
                            echo "<td>" . $row['tema'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table><br>";
 
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