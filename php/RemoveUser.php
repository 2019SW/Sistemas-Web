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

	$sql = "DELETE FROM usuarios WHERE correo LIKE '". $_POST['correo'] ."'";
	if ($r = mysqli_query($conn, $sql)) {
		echo "";
	} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>