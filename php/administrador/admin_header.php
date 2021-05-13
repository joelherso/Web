<!doctype html>
<html class="no-js" lang="">
<?php session_start();?>
<?php include("../../php/con_bd.php");


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
        <link rel="apple-touch-icon" href="../../img/apple-touch-icon.png">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/main.css">

        <script src="../../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="../../js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../js/vendor/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class=" navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin_menu.php"><i class="fas fa-user-cog"></i> &nbsp;  ADMINISTRACION</a>
        <div id="navbar" class="navbar-collapse collapse">


        <?php if ($_SESSION['valido'] == true) {?>
         <a class="navbar-brand navbar-right" type="button"
            data-toggle="dropdown"><span class="fas fa-user"></span>
            <?php  $usuario =$_SESSION['nombre']; echo "<strong class=text-uppercase > $usuario </strong>"; ?>
            <span class="caret"></span> </a>
             <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">Algo maybe</a></li>
                 <li class="divider"></li>
                <li><a href="admin_logout.php">Salir</a></li>

       <?php }else {
            header("Location:sesion.php");
       }

       ?>
    </div><!--/.navbar-collapse -->
      </div>
    </nav>


    </body>
