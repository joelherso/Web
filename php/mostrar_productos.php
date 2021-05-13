<?php

include('con_bd.php');
if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

   function portada($row) {

     $precio;
     if(strlen($row['precio']) < 5) {
       $precio = '$'.substr($row['precio'], -4,-3).','.substr($row['precio'], 1).'.00';
     }else {
       $precio = '$'.substr($row['precio'], 0, 2).','.substr($row['precio'],-3).'.00';
     }

    $salida = "";
    $salida = $salida.'<div class="col-sm-4">';
    $salida = $salida.'<div class="thumbnail">';
    $salida = $salida.'<img src="'.'../img/celulares/'. $row['imagen'].'" width="300" height="200">';
    $salida = $salida.'<p><strong>'.$row['nombre'].'</strong></p>';
    $salida = $salida.'<p> Precio: '.$precio.'<p>';
    $salida = $salida.'<a class="btn btn-primary" href="detalle_producto.php?id='.$row['id_producto'].'" role="button">Detalles &raquo;</a>  ';
    if ($_SESSION['valido']) {
      $salida = $salida.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-info" href="add_cart.php?id='.$row['id_producto'].'" role="button"> Añadir <span class="fas fa-shopping-cart"></span></a> ';
    }
    $salida = $salida.'</div>';
    $salida = $salida.'</div>';

    return $salida;

  }

?>
