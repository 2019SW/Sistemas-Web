<div id='page-wrap'>
<header class='main' id='h1'>
   <?php 

  if (!isset($_GET['correo'])){

  	echo "<span class='right'><a href='SignUp.php'>Registro </a></span>";
  	echo "<span class='right'><a href='LogIn.php'>Login</a></span>";	
  }
	 else {

  	echo "<span class='right'><a href='LogOut.php'>Logout</a></span>";
		echo "<span class='right'><div>".$_GET['correo']."</div></span>";	
  }
  ?>
</header>
<nav class='main' id='n1' role='navigation'>
  
  <?php 
  if (!isset($_GET['correo']))echo "<span><a href='Layout.php'>Inicio</a></span>";
  ?>
  <?php 

  // Por alguna razón no me coge el valor de la variable correo, pero funciona por isset devuelve true

  if (isset($_GET['correo'])){
		$message = $_GET['correo'];
  	echo "<span><a href='Layout.php?correo=".$_GET['correo']."'>Inicio</a></span>";
  	echo "<span><a href='HandlingQuizesAjax.php?correo=".$_GET['correo']."'> Insertar Pregunta (AJAX)</a></span>";
  	echo "<span><a href='ShowQuestions.php?correo=".$_GET['correo']."'> Ver Preguntas</a></span>";
    echo "<span><a href='ShowXmlQuestions.php?correo=".$_GET['correo']."'> Ver Preguntas (XML) </a></span>";	
  	echo "<span><a href='Credits.php?correo=".$_GET['correo']."'> Creditos</a></span>";	
  }
  ?>
  
  <?php 
  if (!isset($_GET['correo']))echo "<span><a href='Credits.php'>Creditos</a></span>";
  ?>
  
</nav>
