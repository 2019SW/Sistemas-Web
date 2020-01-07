<?php
  session_start();
  require_once "../GoogleApi/vendor/autoload.php";
  $gClient = new Google_Client();
  $gClient -> setClientId("847137537981-eainscgi61h7rb15hmpa9de7sdbdmpn3.apps.googleusercontent.com");
  $gClient -> setClientSecret("uGjv2kmcnpPVTF4YbmiyxCQl");
  $gClient -> setApplicationName("CPI Login");

  ## Para ejecutar en local descomentar a continuación
  $gClient -> setRedirectUri("http://localhost/sistemas-web-master/GoogleLogin/g-callback.php");
  ## Para ejecutar en la nube descomentar a continuación
  //$gClient -> setRedirectUri("https://intento-9.000webhostapp.com/ProyectoFinal/GoogleLogin/g-callback.php");
  //$gClient -> addScope( scope_or_scopes: "https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
  $gClient-> setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email'));
 ?>
