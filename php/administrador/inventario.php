<?php include ('productos_inventario.php'); ?>
<?php
$tituloPagina = "Inventario";
include ('admin_header.php');
include('../../php/con_bd.php');
$_SESSION['pagina'] = "productos.php";
if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

?>

<style type="text/css">
h1,h2 {
  color: white;
  text-align: center;

}


html, .container, .page-header,  body, .panel-body{
  background-image: url("../../img/fondos/fondo2.jpg");
}
</style>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div  class="page-header">
        <h1> <span><i class="fas fa-warehouse"></i></span> INVENTARIO </h1>
    </div>


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home" >Todos</a></li>
  <li><a data-toggle="tab" href="#menu1">Accesibles</a></li>
  <li><a data-toggle="tab" href="#menu2">Alta Gama</a></li>
</ul>

<div class="tab-content text-center">
  <div id="home" class="tab-pane fade in active text-center">
    <h2>Todos los productos</h2>
    <!-- PRODUCTOS -->
    <div class="row text-center">
    <div class="row">
      <?php $query_registros = "SELECT * FROM productos";
        $resultado=mysqli_query($conn,$query_registros);

        while($row = $resultado->fetch_array()) {
          echo inventario($row);
        } ?>
      </div>
    </div> <!-- /PRODUCTOS -->
  </div>
  <div id="menu1" class="tab-pane fade">
    <h2>Accesibles</h2>
    <!-- PRODUCTOS -->
    <div class="row text-center">
    <div class="row">
      <?php $query_registros = "SELECT * FROM productos WHERE precio < 10000";
        $resultado=mysqli_query($conn,$query_registros);

        while($row = $resultado->fetch_array()) {
          echo inventario($row);
        } ?>
      </div>
    </div> <!-- /PRODUCTOS -->
  </div>
  <div id="menu2" class="tab-pane fade">
    <h2>Alta Gama</h2>
    <!-- PRODUCTOS -->
    <div class="row text-center">
    <div class="row">
      <?php $query_registros = "SELECT * FROM productos WHERE precio >= 10000";
        $resultado=mysqli_query($conn,$query_registros);

        while($row = $resultado->fetch_array()) {
          echo inventario($row);
        } ?>
      </div>
    </div> <!-- /PRODUCTOS -->
  </div>
</div>
</div>


<hr style="background:black">
