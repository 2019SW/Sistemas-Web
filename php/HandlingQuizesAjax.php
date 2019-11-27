<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
	<script type="text/javascript" src="../js/AddQuestionsAjax.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
	<script type="text/javascript" src="../js/CountQuestionsAjax.js"></script>
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
	<div id='preguntas'></div>
    <div id='formPreguntas'>
 
      <br />
      <h2>Formule su pregunta:</h2>
 
      <?php echo "<form" ?>
      <br />
      <br />
 
      <?php echo 'Dirección de correo ehu (*): <input type="text" id="correo" name="correo" value="'.$_COOKIE['correo'].'" readonly/><div id="correDiv" style="color:red;"></div><br>'?>
      Enunciado de la pregunta (*): <input type="text" id="enunciado" name="enunciado" /><div id="enunciadoDiv" style="color:red;"></div><br>
      Respuesta correcta (*): <input type="text" id="correcta" name="correcta" /><div id="correctaDiv" style="color:red;"></div><br>
      Respuesta incorrecta (*): <input type="text" id="incorrecta1" name="incorrecta1"/><div id="incorrecta1Div" style="color:red;"></div><br>
      Respuesta incorrecta (*): <input type="text" id="incorrecta2" name="incorrecta2"/><div id="incorrecta2Div" style="color:red;"></div><br>
      Respuesta incorrecta (*): <input type="text" id="incorrecta3" name="incorrecta3"/><div id="incorrecta3Div" style="color:red;"></div><br>
 
      Complejidad de la pregunta: <select id="complejidad" name="complejidad"/>  
        <option value="1">Baja</option>
        <option value="2">Media</option>
        <option value="3">Alta</option>
      </select> <br><br>
           
      Tema de la pregunta (*): <input type="text" id="tema" name="tema"/> <div id="temaDiv" style="color:red;"></div><br> <br>
           
      <input id="addq" type="button" value="Agregar Pregunta" onclick="addQuestion()" /></input> <img height=1 width=30/>
      <input id="showq" type="button" value="Mostrar Preguntas" /></input> <img height=1 width=30/>
      <input type="reset" value="Borrar" />
      
			<div id="resultado" ></div>
			<div id="tablaXML"></div>
 
 
      </form>
 
    </div>
		<div id = 'mostrarPreguntas'>
		</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>