<?php
function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
  }

$actualizado = "";
$ban1 = $ban2 = $ban3 = $ban4 = $ban5 = $ban5 = $ban7 = $ban7 = $ban8 =$ban9 = false;
$clase = $mensaje = "";

// Variables que guardan el contenido de los campos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
          //advertensia
        } else {
          $ban1 = true;
          $nombre = test_input($_POST["nombre"]);
        }
        if (empty($_POST["descripcion"])) {
          //advertensia
        } else {
          $ban2 = true;
          $descripcion = test_input($_POST["descripcion"]);

        }

        if (empty($_POST["imagen"])) {
          //advertensia
        } else {
          $ban3 = true;
          $imagen = test_input($_POST["imagen"]);

        }
          if (empty($_POST["disponibles"])) {
          //advertensia
        } else {
          $ban4 = true;
          $disponibles = test_input($_POST["disponibles"]);

        }
        if (empty($_POST["precio"])) {
          //advertensia
        } else {
          $ban5 = true;
          $precio = test_input($_POST["precio"]);

        }
        if (empty($_POST["fabricante"])) {
          //advertensia
        } else {
          $ban6 = true;
          $fabricante = test_input($_POST["fabricante"]);

        }
        if (empty($_POST["color"])) {
          //advertensia
        } else {
          $ban7 = true;
          $color = test_input($_POST["color"]);

        }

        if (empty($_POST["capacidad"])) {
          //advertensia
        } else {
          $ban8 = true;
          $capacidad = test_input($_POST["capacidad"]);

        }

        if (empty($_POST["peso"])) {
          //advertensia
        } else {
          $ban9 = true;
          $peso = test_input($_POST["peso"]);

        }

        if ($ban1 && $ban2 && $ban3 && $ban4 && $ban5 && $ban5 && $ban7 && $ban7 && $ban8 && $ban9) {
          $actualizado = true;
          $query = "UPDATE  productos  SET  nombre = '$nombre', descripcion ='$descripcion', imagen = '$imagen', precio ='$precio',
          disponibles ='$disponibles', fabricante ='$fabricante', color ='$color', capacidad ='$capacidad', peso ='$peso' WHERE nombre = '$nombre'";
          $result=mysqli_query($conn,$query);


          if (!$result) {
            $actualizado = false;
          }
        }
    }

    if($actualizado){
      $clase = "alert alert-success";
      $mensaje = "Actualización exitosa";
      $actualizado = true;
    }
    if (!$actualizado) {
      $clase = "alert alert-danger";
      $mensaje = "Error en la actualización";

     }




    ?>
