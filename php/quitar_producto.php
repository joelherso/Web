<?php

session_start();
include('con_bd.php');

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

if (isset ($_GET["id"])) {
  $id_producto = $_GET["id"];
  $query_insert = "DELETE FROM `carrito` WHERE id_producto = '$id_producto' and id_usuario = '$_SESSION[user_id]' LIMIT 1;";
  $resultado=mysqli_query($conn,$query_insert);

  $actualizar_dis = "UPDATE productos SET disponibles = disponibles +1 WHERE id_producto = '$id_producto'";
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
