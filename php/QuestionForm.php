<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
 
      <br />
      <h2>Formule su pregunta:</h2>
 
      <?php echo "<form id='fquestion' name='fquestion' method='POST' action='AddQuestion.php?".$_GET['correo']."'>" ?>
      <br />
      <br />
 
      Dirección de correo ehu (*): <input type="text" id="correo" name="correo" /><div id="correDiv" style="color:red;"></div><br>
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
           
      <input id="submit" type="submit" value="Enviar" /></input> <img height=1 width=30/>
      <input type="reset" value="Borrar" />
            <div id="error" style="color:red;"></div> <br>
            <div id="correcto" style="color:green;"></div>
     
 
 
      </form>
 
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>