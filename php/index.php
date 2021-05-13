<?php include ('mostrar_productos.php'); ?>
<?php
$tituloPagina = "Inicio E-Shop";
$pagina = "inicio";
include ('header.php');
include('con_bd.php');
$_SESSION['pagina'] = "index.php";

 ?>
 <?php if ($_SESSION['error']) { ?>
     <div class= "alert alert-danger fade in text-center">
       <a class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong >Correo o contraseña incorrecto</strong>
     </div>

 <?php }?>


 <style type="text/css">
 .jumbotron {
    background-image: url("../img/fondos/fondo3.jpg");
    margin-bottom: 0px;
    background-position: 0% 70%;
    background-size: cover;
    background-repeat: no-repeat;
    color: white;
 }

 </style>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div  class="jumbotron">
      <div class="container">
        <h1>Bienvenidos a E-Shop</h1>
        <p>Aquí encontraras variedades de productos a la venta</p>
        <p><a class="btn btn-primary btn-lg" href="productos.php" role="button">Ver todos los prodcutos &raquo;</a></p>
      </div>
    </div>

    <!-- PRODUCTOS -->
    <h2 class="text-center">POPULARES</h2>
    <div class="row text-center">
      <?php $query_registros = "SELECT *  FROM productos  where vendidos>= 20 LIMIT 6";
        $resultado=mysqli_query($conn,$query_registros);

        while($row = $resultado->fetch_array()) {
          echo portada($row);
        } ?>
      </div>
     <!-- /PRODUCTOS -->


     <!-- imagen promocional -->
     <img src="../img/promos/promo2.jfif" class="img-responsive" style="width:100%">
     <hr>
     <!-- imagen promocional -->



     <h2 class="text-center">ACCESIBLES</h2><hr>
     <div class="row text-center">
       <?php $query_registros = "SELECT *  FROM productos  where precio <10000 && vendidos>=15 LIMIT 6";
         $resultado=mysqli_query($conn,$query_registros);

         while($row = $resultado->fetch_array()) {
           echo portada($row);
         } ?>
       </div>
      <!-- /PRODUCTOS -->
      <hr>


      <!-- imagen promocional -->
      <img src="../img/promos/promo.jpg" class="img-responsive" style="width:100%">
      <hr>
      <!-- imagen promocional -->

<?php include ('footer.php'); ?>
