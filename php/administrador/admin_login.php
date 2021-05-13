<?php

session_start();

  $_SESSION['valido']="";
  $_SESSION['nombre']="";
  $_SESSION['user_id']="";
  $error1="";
  $error2="";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["correo"]) && empty($_POST["contra"])) {
      $name = "Datos necesarios";
    } else {
      $correo_escrito = $_POST["correo"];
      $contra_escrito = $_POST["contra"];

      $email = 'admin@gmail.com';
      $pssw = 'admin1234';

      if ( $email == $correo_escrito && $pssw == $contra_escrito) {
        $_SESSION['valido'] = true;
        $_SESSION['error'] = false;
        $_SESSION['nombre'] = "ADMIN";
        $_SESSION['user_id'] = 34;
        header("Location:admin_menu.php");
        exit;
      }else {
        $error1 = "alert alert-danger fade in text-center";
        $error2 = "Correo o contraseña incorrecto";
      }
    }

  }


?>
