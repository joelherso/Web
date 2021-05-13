<?php
include("con_bd.php");
session_start();

$_SESSION['valido'];
$_SESSION['error'];
$_SESSION['nombre'];
$_SESSION['user_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["correo"]) && empty($_POST["contra"])) {
    $name = "Datos necesarios";
  } else {
    $correo_escrito = $_POST["correo"];
    $contra_escrito = $_POST["contra"];
  }

}

$query_registros = "SELECT * FROM usuarios WHERE correo = '$correo_escrito' ";
$resultado=mysqli_query($conn,$query_registros);


if(!$resultado){ // hay error en query
   echo "Error query <br>\n";
   exit;
}else {
  $row = $resultado->fetch_array();
  $email = $row['correo'];
  $pssw = $row['pssword'];
  $_SESSION['nombre'] = $row['nombre_usuario'];
  $_SESSION['user_id'] = $row['id_usuario'];

  if ( $email == $correo_escrito && $pssw == $contra_escrito) {
    $_SESSION['valido'] = true;
    $_SESSION['error'] = false;
    header("Location:". $_SESSION['pagina']);
  }else {
    $_SESSION['error'] = true;
    header("Location:". $_SESSION['pagina']);
  }


}


 ?>
