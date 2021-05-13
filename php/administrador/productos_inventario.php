<?php

include('../../php/con_bd.php');
if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

   function inventario($row) {


    $salida = "";
    $salida = $salida.'<div class="col-sm-4">';
    $salida = $salida.'<div class="thumbnail">';
    $salida = $salida.'<img src="'.'../../img/celulares/'. $row['imagen'].'" width="300" height="200">';
    $salida = $salida.'<p><strong>'.$row['nombre'].'</strong></p>';
    $salida = $salida.'<p> Disponibles: '.$row['disponibles'].'<p>';
    $salida = $salida.'<a class="btn btn-info" href="editar.php?id='.$row['id_producto'].'" role="button">Editar <span <i class="far fa-edit"></i></span></a>  ';
    $salida = $salida.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="btn btn-danger" href="eliminar.php?id='.$row['id_producto'].'" role="button"> Eliminar <span <i class="fas fa-trash-alt"></i></span></a> ';
    $salida = $salida.'</div>';
    $salida = $salida.'</div>';

    return $salida;

  }

?>
