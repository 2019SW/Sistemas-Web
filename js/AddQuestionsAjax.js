
<script language = "javascript">

XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){

// Supongo que vamos a pedir el fichero XML? Aunque suene lo mas inseguro del mundo?
	
	if (XMLHttpRequestObject.readyState==4){

		alert (XMLHttpRequestObject.responseText); //visualizar el documento xml como string
		var obj = document.getElementById('resultado');
		var respuesta=XMLHttpRequestObject.responseXML;
		obj.innerHTML=respuesta.getElementsByTagName('titulo')[0].childNodes[0].nodeValue;
	}
}

function addQuestion(){

	// Hay que asignar las variables cogiendo los campos del formulario

	var correo;
	var enunciado;
	var correcta,
	var incorrecta1;
	var incorrecta2;
	var incorrecta3;
	var complejidad;
	var tema;

	XMLHttpRequestObject.open("POST","addQuestion.php",true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send("correo="+correo+"&"+"enunciado="+enunciado+"&"+"correcta="+correcta+"&"+"incorrecta1="+incorrecta1+"&"+
								"incorrecta2="+incorrecta2+"&"+"incorrecta3="+incorrecta3+"&"+"complejidad="+complejidad+"&"+"tema="+tema+"&"+); //Poner en el send los parametros del email
}

</script>