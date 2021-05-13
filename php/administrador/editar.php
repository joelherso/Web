<?php
$tituloPagina = "Editar producto";
include('admin_header.php');
include('../../php/con_bd.php');

$nombre = $descripcion = $imagen = $disponibles = $precio = $fabricante = $color = $capacidad = $peso = "";

include("actualizar.php");

if (isset ($_GET["id"])) {
  $id_producto = $_GET["id"];
  $query_registros = "SELECT * FROM productos WHERE id_producto = $id_producto";
  $resultado=mysqli_query($conn,$query_registros);

  if (isset($resultado)) { //Verificamos que se haya obtenido un resultado
    $row = $resultado->fetch_array();
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $imagen = $row['imagen'];
    $disponibles = $row['disponibles'];
    $precio = $row['precio'];
    $fabricante = $row['fabricante'];
    $color = $row['color'];
    $capacidad = $row['capacidad'];
    $peso = $row['peso'];
  }else {//Caso de error regresamos a productos
    header("Location: editar.php");

  }

}

?>

<?php  ?>

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
             <h3 class="form-title"><i class="far fa-edit"></i> Editar</h3>

            </div>
        <div class="well">
            <div class="form-body">
              <div class="form-group ">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="fas fa-mobile-alt"></span></div>
                      <input name="nombre" type="text" class="form-control" placeholder="Nombre producto" value="<?php echo $nombre ?>">
                      </div>
                 </div>

                 <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="fas fa-align-left"></span></div>
                      <input name="descripcion" type="text" class="form-control" placeholder="Descripción" value="<?php echo $descripcion ?>">
                      </div>
                      <span class="help-block" id="error"></span>
                 </div>

                <div class="form-group ">
                      <div class="input-group">
                      <div class="input-group-addon"><span><i class="far fa-image"></i></span></div>
                      <input name="imagen" type="text" class="form-control" placeholder="Nombre de la imagen"  value="<?php echo $imagen ?>">
                      </div>
                      <span class="help-block" id="error"></span>
                 </div>

                      <div class="row">
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span ><i class="fas fa-money-bill-wave"></i></span></div>
                                <input name="precio"  type="number" class="form-control" placeholder="Precio" value="<?php echo $precio ?>">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                           <div class="form-group col-lg-4">
                                <div class="input-group center">
                                <div class="input-group-addon"><span ><i class="fas fa-cubes"></i></span></div>
                                <input name="disponibles" type="number" class="form-control" placeholder="Disponibles" value="<?php echo $disponibles ?>">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                           <div class="form-group col-lg-4">
                                <div class="input-group center">
                                <div class="input-group-addon"><span><i class="fas fa-industry"></i></span></div>
                                <input name="fabricante" type="text" class="form-control" placeholder="Fabricante" value="<?php echo $fabricante ?>">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                      </div>

                      <div class="row">
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span ><i class="fas fa-palette"></i></span></div>
                                <input name="color" type="text" class="form-control" placeholder="Color" value="<?php echo $color ?>">
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                            <div class="form-group col-lg-4">
                                <div class="input-group center">
                                <div class="input-group-addon"><span ><i class="fas fa-sim-card"></i></span></div>
                                <input name="capacidad" type="text" class="form-control" placeholder="Capacidad de almacenamiento" value="<?php echo $capacidad ?>">
                                </div>
                                <span class="help-block" id="error"></span>
                          </div>

                            <div class="form-group col-lg-4">
                             <div class="input-group center">
                             <div class="input-group-addon"><span><i class="fas fa-weight-hanging"></i></span></div>
                             <input name="peso" type="text" class="form-control" placeholder="Peso" value="<?php echo $peso ?>" >
                             </div>
                             <span class="help-block" id="error"></span>
                           </div>

               </div>
             </div>

                    <button type="submit" class="btn btn-info btn-lg">
                    <span> <i class="fas fa-pencil-alt"></i></span> Actualizar
                    </button>


                  </form>

                </div>
              </div>

                 <div class= "<?php echo $clase; ?>" id = "register">
                   <strong > <?php echo $mensaje; ?></strong>
                 </div>

                   <form class="" action="inventario.php" method="post">
                     <button type="submit"  class="btn btn-info btn-lg"
                     name="button" >  <span><i class="fas fa-cubes"></i></span> Inventario</button>
                   </form>



            </div>


  </body>
