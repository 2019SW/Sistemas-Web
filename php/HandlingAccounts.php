<?php session_start(); ?>
<?php include 'DbConfig.php'?>
<?php
	if ($_SESSION['var'] != 'admin'){
		header('Location: https://youtu.be/dQw4w9WgXcQ');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
	<script type="text/javascript" src="../js/HandlingAccounts.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
					<?php
				 
					// Create connection
					$conn = mysqli_connect($server, $user, $pass, $basededatos);
					// Check connection
					if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
					}
												 
					$sql = "SELECT * FROM usuarios";
					if ($r = mysqli_query($conn, $sql)) {
							$resultset=array();  //Associative Array
							echo "<div id='table'><center><table border=1>
									<tr>
									<th>Tipo</th><th>Correo</th><th>Nombre</th><th>Password</th><th>Estado</th><th>Des/Bloquear</th><th>Borrar</th>
									
									<tr>
									</tr></center>";    
									while($row=mysqli_fetch_assoc($r))
									{
											echo "<tr>";
											echo "<td>" . $row['usuario'] . "</td>";
											echo "<td>" . $row['correo'] . "</td>";
											echo "<td>" . $row['nombre'] . "</td>";
											echo "<td>" . $row['password'] . "</td>";
											if ($row['bloqueado'] == '0')
												echo "<td> Activo </td>";
											else
												echo "<td> Bloqueado </td>";
											echo "<td><button value=" . $row['correo'] . " onClick='cambiarEstado(this.value)'>Cambiar Estado</button></td>";
											echo "<td><button value=" . $row['correo'] . " onClick='borrarUsuario(this.value)' >Borrar</button></td>";
											echo "</tr>";
									}
									echo "</table><br>";

					} else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					mysqli_close($conn);
					?>
				</div>
				<div id='error'></div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>