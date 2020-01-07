<div id='page-wrap'>
<header class='main' id='h1'>
   <?php

  if (!isset($_SESSION['var'])){

    echo "<span class='right'><a href='SignUp.php'>Registro </a></span>";
    echo "<span class='right'><a href='LogIn.php'>Login </a></span>";echo ("<br>");
    echo "<span class='right'><a href='GoogleLogin.php'>Google!</a></span>";
  }
     else {

    echo "<span class='right'><a href='LogOut.php'>Logout</a></span>";
        echo "<span class='right'><div>".$_COOKIE['correo']."</div></span>";
  }
  ?>
</header>
<nav class='main' id='n1' role='navigation'>

  <?php
  if (!isset($_SESSION['var']))echo "<span><a href='Layout.php'>Inicio</a></span>";
  ?>
  <?php

  if (isset($_SESSION['var']) && $_SESSION['var']=="admin"){

    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='HandlingAccounts.php'>Gestionar usuarios</a></span>";
    echo "<span><a href='Credits.php'> Creditos</a></span>";
  }else if (isset($_SESSION['var']) && $_SESSION['var']=="usuario"){

    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='HandlingQuizesAjax.php'>Gestionar Preguntas</a></span>";
    echo "<span><a href='modificarContrasena.php'> Modificar contraseña</a></span>";
    echo "<span><a href='Credits.php'> Creditos</a></span>";
  }
  ?>

  <?php
  if (!isset($_SESSION['var'])){
    echo "<span><a href='Credits.php'>Creditos</a></span>";
    echo "<span><a href='modificarContrasena.php'> Modificar contraseña</a></span>";
  }
  ?>

</nav>
