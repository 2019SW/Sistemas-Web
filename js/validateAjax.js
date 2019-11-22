	
$(document).ready(function()
{
	var correoOK = 0;
	var passwordOK = 0;
	
	$("#correo").focusout(function(){

			var correo = $("#correo").val();

			if (correo == ""){

				$("#correoVip").text("Introduzca un correo válido...");
				correoOK=0;	
			}else{ 
        		$.post("../php/ClientVerifyEnrollment.php", {correo: correo}, 
        				function(resultado){
        				
        					if (resultado.search('NO</z') !== -1){

        						$("#correoVip").text("Lo siento, no eres VIP...");
        						correoOK=0;
        					} 
        					else if (resultado.search('SI</z') !== -1){

        						$("#correoVip").text("Puede continuar con el registro...");
        						correoOK=1;
        					} 
        					if (correoOK && passwordOK) $("input").removeAttr('disabled');       				     				
    			});
    		}
	});

	$("#password").focusout(function(){
			
			var password = $("#password").val();

			if (password == ""){
        		$("#passwordCorrecta").text("Introduzca una contraseña válida...");
        		passwordOK=0;
        	}else{

        		$.post("../php/ClientVerifyPass.php", {password: password}, 
        				function(resultado){
   			
        					if (resultado.search('INVALIDA') !== -1 || $("#password").val() == ""){

        						$("#passwordCorrecta").text("Esa clave te la pillan con un ataque de diccionario...");
        						passwordOK=0;
        					} 
        					else if (resultado.search('VALIDA') !== -1){

        						$("#passwordCorrecta").text("Vale por ahora...");
        						passwordOK=1;
        					} 
   							if (correoOK && passwordOK) $("input").removeAttr('disabled');
	   			});
	   		}
	});

});