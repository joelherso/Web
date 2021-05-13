<?php

session_start();
include('con_bd.php');

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

$cantidad;



if (isset ($_GET["id"])) {
  $id_producto = $_GET["id"];

  $query_registros = "SELECT COUNT(id_producto) as cantidad FROM carrito where id_producto = $id_producto and id_usuario= '$_SESSION[user_id]' GROUP by id_producto;";
  $resultado=mysqli_query($conn,$query_registros);
  $row = $resultado->fetch_array();
  $cantidad= $row['cantidad'];

  $query_insert = "DELETE FROM carrito WHERE id_producto = $id_producto and id_usuario = '$_SESSION[user_id]' ;";
  mysqli_query($conn,$query_insert);


  $actualizar_dis = "UPDATE productos SET disponibles = disponibles + $cantidad WHERE id_producto = '$id_producto'";
  mysqli_query($conn,$actualizar_dis);

  header("Location: carrito.php");

  if (!isset($resultado)) { //Verificamos que se haya obtenido un resultado
    header("Location: carrito.php");
    exit();
  }
  }else {
    header("Location: carrito.php");

  }

?>
