//<script language = "javascript">
function addQuestion(){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){

	// Supongo que vamos a pedir el fichero XML? Aunque suene lo mas inseguro del mundo?
	
		if (xhttp.readyState==4 && this.status == 200){
			alert (xhttp.responseText); //visualizar el documento xml como string
			var obj = document.getElementById('resultado');
			var respuesta = xhttp.responseXML;
			obj.innerHTML = respuesta.getElementsByTagName('titulo')[0].childNodes[0].nodeValue;
		}
	};



	// Hay que asignar las variables cogiendo los campos del formulario
	
	var correo 			= document.getElementById("correo").value;
	var enunciado 	= document.getElementById("enunciado").value;
	var correcta 		= document.getElementById("correcta").value;
	var incorrecta1 = document.getElementById("incorrecta1").value;
	var incorrecta2 = document.getElementById("incorrecta2").value;
	var incorrecta3 = document.getElementById("incorrecta3").value;
	var complejidad = document.getElementById("complejidad").value;
	var tema 				= document.getElementById("tema").value;
	
	xhttp.open("POST","addQuestion.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("correo="+correo+"&"+"enunciado="+enunciado+"&"+"correcta="+correcta+"&"+"incorrecta1="+incorrecta1+"&"+"incorrecta2="+incorrecta2+"&"+"incorrecta3="+incorrecta3+"&"+"complejidad="+complejidad+"&"+"tema="+tema); //Poner en el send los parametros del email

	/*
	xhttp.open("POST","addQuestion.php",true);
  xhttp.send();
	*/
}

//</script>