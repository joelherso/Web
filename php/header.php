<!doctype html>
<html class="no-js" lang="">
<?php session_start();?>
<?php include("con_bd.php");

$items;
if ($_SESSION['valido'] == true)  {
  $query_registros = "SELECT COUNT(id_usuario) as cantidad FROM carrito WHERE id_usuario = '$_SESSION[user_id]';";
  $resultado=mysqli_query($conn,$query_registros);
  $row = $resultado->fetch_array();
  $items= $row['cantidad'];

}else {
  $items = "0";
}

?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> <?php echo $tituloPagina; ?></title>
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
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">

        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="../js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../js/vendor/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class=" navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
          <ul class="nav navbar-nav ">
          <li <?php if($pagina == "inicio")?>> <a class="navbar-brand" href="index.php"> Inicio </a></li>
          <li <?php if($pagina == "productos") ?>> <a class="navbar-brand" href="productos.php"> Productos </a></li>
          <li <?php if($pagina == "nosotros") ?>><a class="navbar-brand" href="nosotros.php"> Nosotros </a></li>
          <li <?php if($pagina == "contacto")?>><a  class="navbar-brand" href="contacto.php"> Contacto </a></li>
          </ul>

        </div>



        <div id="navbar" class="navbar-collapse collapse">



        <?php if ($_SESSION['valido'] == true) {?>
          <a class="navbar-brand navbar-right" href="carrito.php"> <span class="fas fa-shopping-cart"></span>
          <span class="badge badge-pill badge-light" id="carrito_cantidad"> <?php echo $items?></span></a>

         <a class="navbar-brand navbar-right" type="button"
            data-toggle="dropdown"><span class="fas fa-user"></span>
            <?php  $usuario =$_SESSION['nombre']; echo "<strong class=text-uppercase > $usuario </strong>"; ?>
        <span class="caret"></span> </a>
         <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="historial.php">Mis compras</a></li>
             <li class="divider"></li>
            <li><a href="logout.php">Salir</a></li>
         </ul>

        <?php }else { ?>
          <a class="navbar-brand navbar-right
          " href="registro.php" > </span > Regístrate</a>
          <form class="navbar-form navbar-right" action="login.php" role="form" method="POST">
            <div class="form-group">
              <input name ="correo" type="text" placeholder="Correo" class="form-control" required>
            </div>
            <div class="form-group">
              <input name ="contra" type="password" placeholder="Contraseña" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ingresar</button>
          </form>

        <?php } ?>
    </div><!--/.navbar-collapse -->
      </div>
    </nav>


    </body>
