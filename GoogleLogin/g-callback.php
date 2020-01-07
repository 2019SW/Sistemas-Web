<?php
  require_once "../php/config.php";

  if (isset($_GET['code'])){
    $token = $gClient -> fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
  }
  $oAuth = new Google_Service_Oauth2($gClient);
  $userData = $oAuth->userinfo_v2_me->get();

  //print_r ($_SESSION['access_token']);
  //$userData = $oAuth -> userinfo_v2_me->get();
  $_SESSION['email']= $userData['email'];

  $_SESSION['var']="usuario";
  setcookie("correo", $userData['email'], time() + (86400*30), "/");
  echo '<script>alert("Bienvenido de nuevo, redirigiendo...");parent.location = "../php/Layout.php"</script>';

  //header('Location: ../php/Layout.php');
  //exit();
?>
