<?php session_start();?>
<?php
	if ($_SESSION['var'] != 'usuario'){
		header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php include 'DbConfig.php'?>
    <?php
        $correo = $_POST['correo'];
        $enunciado = $_POST['enunciado'];
        $incorrecta1 = $_POST['incorrecta1'];
        $incorrecta2 = $_POST['incorrecta2']; 
        $incorrecta3 = $_POST['incorrecta3']; 
        $correcta = $_POST['correcta'];
        $tema = $_POST['tema'];	
				
				// Recibimos los datos de la imagen
				$nombre_img = $_FILES['imagen']['name'];
				$tipo = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
								

        if(empty($correo) or empty($enunciado) or empty($incorrecta1) or empty($incorrecta2) or empty($incorrecta3) or empty($correcta) or empty($tema) or empty($nombre_img)){
          $aviso = "No todos los campos están llenos"; //.= para concatenar
        } else if(strlen($enunciado) < 10){
          $aviso = "El enunciado ha de ser de un mínimo de 10 carácteres";
        } else if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){

            // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
					
					$directorio = $_SERVER['DOCUMENT_ROOT']. '/Sistemas-Web/images/' . basename($_FILES["imagen"]["name"]);
         
          $sql = "INSERT INTO preguntas (correo, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, complejidad, tema, imagen) VALUES ('". $_POST["correo"] ."', '". $_POST["enunciado"] ."', '". $_POST["correcta"] ."', '". $_POST["incorrecta1"] ."', '". $_POST["incorrecta2"] ."', '". $_POST["incorrecta3"] ."', '". $_POST["complejidad"] ."', '". $_POST["tema"] ."', '". $_FILES['imagen']['name'] ."')";
					
          if (mysqli_query($conn, $sql) and move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio)) {
								
                $aviso = "Pregunta añadida con éxito";
								echo"<br><a href='ShowQuestions.php?correo=".$_GET["correo"]."'>. Puede ver las preguntas existentes si pinchas aquí</a>";
								if (move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__.'/../../uploads/'. $_FILES["imagen"]['name'])) {
										echo "Uploaded";
								} else {
									 echo "File was not uploaded";
								}
								// Ruta donde se guardarán las imágenes que subamos
								//move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
																			
          } else {
                $aviso =  "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
					
					//Se añade al fichero XML
					$xml = simplexml_load_file('../xml/Questions.xml');
					$pregunta = $xml->addChild('assessmentItem');
					$pregunta->addAttribute('subject', $tema);
					$pregunta->addAttribute('author', $correo);
					$pregunta->addAttribute('image', $nombre_img);
					
					$itemBody = $pregunta->addChild('itemBody');
					$itemBody ->addChild('p', $enunciado);
					
					$correctResponse = $pregunta->addChild('correctResponse');
					$correctResponse->addChild('value', $correcta);
					
					$incorrectResponses = $pregunta->addChild('incorrectResponses');
					$incorrectResponses->addChild('value', $incorrecta1);
					$incorrectResponses->addChild('value', $incorrecta2);
					$incorrectResponses->addChild('value', $incorrecta3);
					
					$xmlContent = $xml->asXML('../xml/Questions.xml');

          function formatXml($simpleXMLElement)
          {
            $xmlDocument = new DOMDocument('1.0');
            $xmlDocument->preserveWhiteSpace = false;
            $xmlDocument->formatOutput = true;
            $xmlDocument->loadXML($simpleXMLElement->asXML());

            return $xmlDocument->saveXML();
          }

          $xmlContent = formatXml($xml);

        } else {
					$aviso = "El fichero no es una imagen";
				}
      ?>
      
			<div id="aviso"><?php echo $aviso; ?></div>
        
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>