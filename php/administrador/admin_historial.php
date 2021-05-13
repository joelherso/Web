<?php
$tituloPagina = "Historial de compras";
include ('admin_header.php');
include('../../php/con_bd.php');

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}



    $query_registros = "SELECT p.id_producto, nombre, fabricante, COUNT(nombre) as cantidad, imagen, fecha_compra, nombre_usuario
                        FROM productos p, historial h, usuarios u
                        WHERE p.id_producto = h.id_producto and h.id_usuario = u.id_usuario
                        GROUP by nombre;";
    $resultado=mysqli_query($conn,$query_registros);


?>

<link rel="stylesheet" href="../../css/admin_historial.css">
		<div class="container">
			        <h2 style="color:black">Historial de compras</h2>
			        <div class="table-cart">
	                    <table class="table">
	                        <thead>
	                            <tr>

                                  <th>Usuario</th>
	                                <th>Producto</th>
	                                <th>Cantidad</th>
	                                <th>Fecha de Compra</th>

	                            </tr>
	                        </thead>
	                        <tbody>

                            <?php while ($row = $resultado->fetch_array()) {?>

	                            <tr>

                                <td >
                                      <div class="display-flex align-center">
                                          <?php echo $row['nombre_usuario']; ?>
                                      </div>
                                </td>
	                                <td>
	                                	<div class="display-flex align-center">
		                                    <div class="img-product">
		                                      <a href="<?php echo 'detalle_producto.php?id='.$row['id_producto'];?>"><img src="<?php echo "../../img/celulares/".$row['imagen']; ?>" alt="" class="mCS_img_loaded" ></a>
		                                    </div>
		                                    <div class="name-product">
		                                        <?php echo $row['nombre']; ?>
		                                        <br><?php echo $row['fabricante']; ?>
		                                    </div>
	                                    </div>
	                                </td>
	                                <td >
	                                      <div class="display-flex align-center">
                                            <?php echo $row['cantidad']; ?>
										                    </div>
	                                </td>

                                  <td class="product-count">
                                    <?php echo $row['fecha_compra']; ?>
                                  </td>
	                            </tr>

                            <?php } ?>
	                        </tbody>
	                    </table>
			        </div>
		</div>
