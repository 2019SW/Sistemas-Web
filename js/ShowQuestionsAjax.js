$(document).ready(function(){
	$("#showq").click(function(){
		$.ajax({
			type: "GET",
			url: "../xml/Questions.xml",
			dataType: "xml",
			success: function (xml) {
				// Parse the xml file and get data
				var tabla = "<center><table border=1><tr><th>Correo</th><th>Enunciado</th><th>Correcta</th><th>Incorrecta1</th><th>Incorrecta2</th><th>Incorrecta3</th><th>Tema</th><tr></tr></center>";
				
				$(xml).find('assessmentItems').find('assessmentItem').each(function () {
					tabla += "<tr><td>" + $(this).attr('author') + "</td>";
					tabla += "<td>" + $(this).find('itemBody').text() + "</td>";
					tabla += "<td>" + $(this).find('correctResponse').text() + "</td>";
					$(this).find('incorrectResponses').find('value').each(function () {
						tabla += "<td>" + $(this).text() + "</td>";
					});
					tabla += "<td>" + $(this).attr('subject') + "</td></tr>";
				});
				$("#tablaXML").html(tabla);
			}
		});	
	});
	
	
	$("#addq").click(function(){
		if( $('#tablaXML').html()){
			$.ajax({
				type: "GET",
				url: "../xml/Questions.xml",
				dataType: "xml",
				success: function (xml) {
					// Parse the xml file and get data
					var tabla = "<center><table border=1><tr><th>Correo</th><th>Enunciado</th><th>Correcta</th><th>Incorrecta1</th><th>Incorrecta2</th><th>Incorrecta3</th><th>Tema</th><tr></tr></center>";
					
					$(xml).find('assessmentItems').find('assessmentItem').each(function () {
						tabla += "<tr><td>" + $(this).attr('author') + "</td>";
						tabla += "<td>" + $(this).find('itemBody').text() + "</td>";
						tabla += "<td>" + $(this).find('correctResponse').text() + "</td>";
						$(this).find('incorrectResponses').find('value').each(function () {
							tabla += "<td>" + $(this).text() + "</td>";
						});
						tabla += "<td>" + $(this).attr('subject') + "</td></tr>";
					});
					$("#tablaXML").html(tabla);
				}
			});	
		}
	});
});