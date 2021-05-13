<?php

session_start();
include('con_bd.php');

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

if (isset ($_GET["id"])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["cantidad"])) {

      } else {
        $cantidad = $_POST["cantidad"];
      }
  }else {
    $cantidad = 1;
  }

  $id_producto = $_GET["id"];
  $query_dis = "SELECT disponibles FROM productos WHERE id_producto = $id_producto";
  $resu=mysqli_query($conn,$query_dis);
  $row = $resu->fetch_array();

  $disponibles = $row['disponibles'];

  if ($disponibles > 0 && $cantidad <= $disponibles && $cantidad > 0) {

    for ($i=0; $i < $cantidad; $i++) {
      $query_insert = "INSERT INTO carrito(id_producto,id_usuario) VALUES ('$id_producto','$_SESSION[user_id]')";
      mysqli_query($conn,$query_insert);

      $actualizar_dis = "UPDATE productos SET disponibles = disponibles - $cantidad WHERE id_producto = '$id_producto'";
      mysqli_query($conn,$actualizar_dis);
    }


    header("Location:". $_SESSION['pagina']."?id=".$id_producto);

  }

  if (!isset($resultado)) { //Verificamos que se haya obtenido un resultado
    header("Location:". $_SESSION['pagina']."?id=".$id_producto);
    exit();
  }
}else {
  header("Location: detalle_producto.php?id=".$id_producto);

}

?>
