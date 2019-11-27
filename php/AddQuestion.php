<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
	<?php
		if ($_SESSION['var'] != 'usuario'){
			header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
			exit;
		}
	?>
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

        if(empty($correo) or empty($enunciado) or empty($incorrecta1) or empty($incorrecta2) or empty($incorrecta3) or empty($correcta) or empty($tema)){
          $aviso = "No todos los campos están llenos"; //.= para concatenar
        } else if(!preg_match('/[a-z]+\d{3}@ikasle\.ehu\.(es|eus)/',$correo) && !preg_match('/[a-z]+(\.[a-z]+)?@ehu\.(es|eus)/', $correo)){
          $aviso = "El email introducido es incorrecto";
        } else if(strlen($enunciado) < 10){
          $aviso = "El enunciado ha de ser de un mínimo de 10 carácteres";
        } else {

            // Create connection
          $conn = mysqli_connect($server, $user, $pass, $basededatos);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
           
         
          $sql = "INSERT INTO preguntas (correo, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, complejidad, tema) VALUES ('". $_POST["correo"] ."', '". $_POST["enunciado"] ."', '". $_POST["correcta"] ."', '". $_POST["incorrecta1"] ."', '". $_POST["incorrecta2"] ."', '". $_POST["incorrecta3"] ."', '". $_POST["complejidad"] ."', '". $_POST["tema"] ."')";
          if (mysqli_query($conn, $sql)) {
                $aviso = "Pregunta añadida con éxito";
                      echo"<br><a href='ShowQuestions.php?correo=".$_GET["correo"]."'>. Puede ver las preguntas existentes si pinchas aquí</a>";
          } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
					
					//Se añade al fichero XML
					$xml = simplexml_load_file('../xml/Questions.xml');
					$pregunta = $xml->addChild('assessmentItem');
					$pregunta->addAttribute('subject', $tema);
					$pregunta->addAttribute('author', $correo);
					
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

        }
      ?>
      
			<div id="aviso"><?php echo $aviso; ?></div>
        
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>