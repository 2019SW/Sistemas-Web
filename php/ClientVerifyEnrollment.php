
<?php

	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');


	// ****************Parte de creación del cliente ****************

	$soapclient = new nusoap_client('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

	$correo = $_POST["correo"];

	$soapclient -> call('comprobar',array('x'=> $correo));
	echo($soapclient);



?>