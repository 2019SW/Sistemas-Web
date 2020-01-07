//<script language = "javascript">
function addQuestion(){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){

		if (xhttp.readyState==4 && this.status == 200){
					
			var obj = document.getElementById('resultado');
			var respuesta = xhttp.responseText;
			var pos1 = respuesta.search('<div id="aviso">') + 16;
			var pos2 = respuesta.indexOf("</div>", 1025 );
			var res = respuesta.substring(pos1, pos2);
			obj.innerHTML = res;	
			//obj.innerHTML = respuesta;	
			
			
			console.log(pos1, pos2, res);
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
	var imagen 			= document.getElementById("imagen").files[0];
	
	console.log(imagen);
		
	
	
	xhttp.open("POST","AddQuestion.php?correo=" + correo,true);
	//xhttp.setRequestHeader("Content-type", "multipart/form-data");
	var formData = new FormData();
	
	formData.append("correo", correo);
	formData.append("enunciado", enunciado);
	formData.append("correcta", correcta);
	formData.append("incorrecta1", incorrecta1);
	formData.append("incorrecta2", incorrecta2);
	formData.append("incorrecta3", incorrecta3);
	formData.append("complejidad", complejidad);
	formData.append("tema", tema);
	formData.append("imagen", imagen);
	xhttp.send(formData);
	
	
	/*
	xhttp.open("POST","AddQuestion.php?correo=" + correo,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("correo="+correo+"&"+"enunciado="+enunciado+"&"+"correcta="+correcta+"&"+"incorrecta1="+incorrecta1+"&"+"incorrecta2="+incorrecta2+"&"+"incorrecta3="+incorrecta3+"&"+"complejidad="+complejidad+"&"+"tema="+tema); //Poner en el send los parametros del email
	*/


}

//</script>