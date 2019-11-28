//<script language = "javascript">
function cambiarEstado(correo){	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
	
		if (xhttp.readyState==4 && this.status == 200){
			var obj = document.getElementById('error');
			var respuesta = xhttp.responseText;
			obj.innerHTML = respuesta;
			reemprimir();
			//console.log(reemprimir());
		}
	};
	
	xhttp.open("POST","ChangeState.php?correo=" + correo,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("correo="+correo); //Poner en el send los parametros del email
}

function borrarUsuario(correo){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
	
		if (xhttp.readyState==4 && this.status == 200){
			var obj = document.getElementById('error');
			var respuesta = xhttp.responseText;
			obj.innerHTML = respuesta;
			reemprimir();
			//console.log(reemprimir());
		}
	};
	
	xhttp.open("POST","RemoveUser.php?correo=" + correo,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("correo="+correo); //Poner en el send los parametros del email
}

function reemprimir(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
	
		if (xhttp.readyState==4 && this.status == 200){
			var obj = document.getElementById('table');
			var respuesta = xhttp.responseText;
			var pos1 = respuesta.search("<div id='table'>");
			var pos2 = respuesta.indexOf("</div>", 1221);
			var res = respuesta.substring(pos1, pos2);
			obj.innerHTML = res;
		}
	};
	
	xhttp.open("GET","HandlingAccounts.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(); //Poner en el send los parametros del email
}