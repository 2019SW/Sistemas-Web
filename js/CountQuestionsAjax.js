$(function(){	
	contador();
  setInterval(contador, 10000);
	function contador(){
		$.ajax({
			type: "GET",
			url: "../xml/Questions.xml",
			dataType: "xml",
			success: function (xml) {
				// Parse the xml file and get data
				var user = 0;
				var total = 0;
				var mail = $('#correo').val();
				$(xml).find('assessmentItems').find('assessmentItem').each(function () {
					if($(this).attr('author') == mail){
						user++;
					}
					total++;
				});
				$("#preguntas").html(user.toString() + "/" + total.toString());
			}
		});
	}	
});