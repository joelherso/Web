<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> Registro </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <style>
      body {
          padding-top: 50px;
          padding-bottom: 20px;
      }

      form {
        text-align: center;
      }


  </style>
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../css/main.css">

  <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">E-Shop</a>
 </nav>

  <div class="container">
     <div class="signup-form-container">

          <!-- Inicio del forms -->


  <form role="form" id="register" action ="r_usuario.php" method="POST" >
          <div class="page-header">
           <h3 class="form-title"><i class="fa fa-user"></i> Registrate</h3>
</form>
    <?php
    function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
      }

include("con_bd.php");

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;
  }else {

	 // Variables que guardan el contenido de los campos del formulario
        $username = $email = $bday = $street = $colony = $postal = $password = $cpasword ="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
              //advertensia
            } else {
              $username = test_input($_POST["username"]);
            }
            if (empty($_POST["email"])) {
              //advertensia
            } else {
              $email = test_input($_POST["email"]);

            }

            if (empty($_POST["bday"])) {
              //advertensia
            } else {
              $bday = test_input($_POST["bday"]);

            }
              if (empty($_POST["street"])) {
              //advertensia
            } else {
              $street = test_input($_POST["street"]);

            }
            if (empty($_POST["colony"])) {
              //advertensia
            } else {
              $colony = test_input($_POST["colony"]);

            }
            if (empty($_POST["postal"])) {
              //advertensia
            } else {
              $postal = test_input($_POST["postal"]);

            }
            if (empty($_POST["password"])) {
              //advertensia
            } else {
              $password = test_input($_POST["password"]);

            }

            if (empty($_POST["cpassword"])) {
              //advertensia
            } else {
              $cpasword = test_input($_POST["cpassword"]);

            }
        }



  $query = "INSERT INTO usuarios(nombre_usuario, correo, pssword, nacimiento, colonia, calle, postal)
        VALUES ('$username','$email','$password','$bday','$colony','$street','$postal');";

	$result=mysqli_query($conn,$query);

        ?>
        <!--Verificamo que el registro sea correcto -->

<?php 	if(!$result){  ?>

  <div class= "alert alert-danger">
    <strong >Error en el registro. Por favor intentalo de nuevo</strong>
  </div>

  <form class="" action="registro.php" method="post">
    <button type="submit"  class="btn btn-info btn-lg"
    name="button" onclick="registro.php"> Registrar</button>
  </form>


<?php }else { ?>

  <div class= "alert alert-success">
    <strong >Registro Exitoso. Por favor redirijase a la pagina de inicio para iniciar sesión</strong>
  </div>

  <form class="" action="index.php" method="post">
    <button type="submit"  class="btn btn-info btn-lg"
    name="button" onclick="registro.php"> Página de inicio</button>
  </form>

   <?php } ?>

<!--Cerramos la condicion de conexion a la base de dats exitosa -->
  <?php } ?>




  </body>
</html>
