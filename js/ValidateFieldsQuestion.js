$(document).ready(function(){
 
				$("#boton").click(function(){


								var ok = true;
								var resultado = "";
								var correo = $("#correo").val();
								if (!($("#correo").val().length > 0 && $("#enunciado").val().length > 0 && $("#incorrecta1").val().length > 0 && $("#incorrecta2").val().length > 0
								&& $("#incorrecta3").val().length > 0 && $("#correcta").val().length > 0 && $("#tema").val().length  > 0 ))
								{
												ok = false;
												$("#error").text("No todos los campos obligatorios han sido rellenados");                          
								} else $("#error").empty();
 
								if (!(/[a-z]+\d{3}@ikasle\.ehu\.(es|eus)/.test(correo) ||
								(/[a-z]+\.[a-z]+@ehu\.(es|eus)/.test(correo))))
								{
												ok = false;
												$("#correDiv").text("El mail introducido es incorrecto");
								} else $("#correDiv").empty();
				
								if (($("#tema").val().length < 10))
								{
												ok = false;
												$("#temaDiv").text("El tema ha de ser de un mínimo de 10 carácteres.");
								} else $("#temaDiv").empty();
 
								if (ok) $("#correcto").text("¡Se ha añadido de forma satisfactoria!");
								else $("#correcto").empty();
				});
 
});