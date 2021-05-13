<?php
$tituloPagina = "Eliminar producto";
include('admin_header.php');
include('../../php/con_bd.php');

$nombre = $id_producto = "";
$clase = $mensaje = "";

function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
  }


if (isset ($_GET["id"])) {
  $id_producto = $_GET["id"];
  $query_registros = "SELECT nombre FROM productos WHERE id_producto = $id_producto";
  $resultado=mysqli_query($conn,$query_registros);

  if (isset($resultado)) { //Verificamos que se haya obtenido un resultado
    $row = $resultado->fetch_array();
    $nombre = $row['nombre'];
  }else {//Caso de error regresamos a productos
    header("Location: eliminar.php");

  }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
      //advertensia
    } else {
      $nombre = test_input($_POST["nombre"]);
    }


    $query = "DELETE FROM productos WHERE nombre = '$nombre' OR id_producto = '$id_producto'";
    $result=mysqli_query($conn,$query);

    if($result){
      $clase = "alert alert-success";
      $mensaje = "Actualización exitosa";
      $actualizado = true;
    }else {
      $clase = "alert alert-danger";
      $mensaje = "Error en la actualización";
     }

  }

?>


<style type="text/css">

        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }



        form {
          text-align: center;
        }
        #register {
          text-align: center;
        }

    </style>
  <body>

    <div class="container">
       <div class="signup-form-container">

            <!-- Inicio del forms -->

            <form role="form" id="register" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >

            <div class="page-header">
             <h3 class="form-title"><i class="fas fa-trash-alt"></i> Eliminar</h3>
             <p>Escribe el id o el nombre del producto para eliminarlo</p>

            </div>
        <div class="well">
            <div class="form-body">

              <div class="form-group ">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="fas fa-list-ol"></span></div>
                      <input name="id_producto" type="text" class="form-control" placeholder="ID de producto" value="<?php echo $id_producto ?>">
                      </div>
                 </div>

                 <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="fas fa-mobile-alt"></span></div>
                      <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="<?php echo $nombre ?>">
                      </div>
                      <span class="help-block" id="error"></span>
                 </div>

               </div>
             </div>

                    <button type="submit" class="btn btn-danger btn-lg">
                    <span> <i class="fas fa-trash-alt"></i></span> Eliminar
                  </button> <br><br>

                  </form>

                </div>
              </div>

                 <div class= "<?php echo $clase; ?>" id = "register">
                   <strong > <?php echo $mensaje; ?></strong>
                 </div>

                   <form class="" action="inventario.php" method="post">
                     <button type="submit"  class="btn btn-info btn-lg"
                     name="button"> <span><i class="fas fa-cubes"></i></span> Inventario</button>
                   </form>



            </div>


  </body>
