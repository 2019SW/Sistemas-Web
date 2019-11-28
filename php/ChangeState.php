<?php session_start(); ?>
<?php include 'DbConfig.php'?>
<?php
	if ($_SESSION['var'] != 'admin'){
		header('Location: https://youtu.be/dQw4w9WgXcQ');
		exit;
	}
?>
<?php

	$correo = $_POST['correo'];
	// Create connection
	$conn = mysqli_connect($server, $user, $pass, $basededatos);
	// Check connection
	if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT bloqueado FROM usuarios WHERE correo LIKE '". $_POST['correo'] ."'";
	if ($r = mysqli_query($conn, $sql)) {
			$resultset=array();  //Associative Array
					while($row=mysqli_fetch_assoc($r))
					{
							if ($row['bloqueado'] == '0')
								$update = 'UPDATE usuarios SET bloqueado="1" WHERE correo LIKE "'. $_POST['correo'] .'"';
							else
								$update = 'UPDATE usuarios SET bloqueado="0" WHERE correo LIKE "'. $_POST['correo'] .'"';
							mysqli_query($conn, $update);
					}

	} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>