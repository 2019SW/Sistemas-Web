<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	$ns="https://intento-9.000webhostapp.com/Lab6/php/";
	$server = new soap_server;
	$server->soap_defencoding = 'utf-8';
	$server->configureWSDL('validar',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;

	$server->register('validar',
	array('x'=>'xsd:string','y'=>'xsd:string'),
	array('z'=>'xsd:string'),
	$ns);

	function validar($x, $y){



		if ($y !== "1010") return new soapval('z','xsd:string','SIN SERVICIO');

		if( substr_count(file_get_contents("../txt/toppasswords.txt"),$x) == 0) {
        	
			return new soapval('z','xsd:string','VALIDA');
   		}	
    	return new soapval('z','xsd:string','INVALIDA');

	}
	if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	$server->service($HTTP_RAW_POST_DATA);
?>