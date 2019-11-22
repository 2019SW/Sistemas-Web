<?php

	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');


	// ****************Parte de creación del cliente ****************

	$soapclient = new nusoap_client('https://intento-9.000webhostapp.com/Lab6/php/VerifyPassWS.php?wsdl', true);

	echo ($soapclient);

	$password = $_POST["password"];

	$soapclient -> call('validar',array('x'=> $password,'y'=>'1010'));
	echo ($soapclient);


?>