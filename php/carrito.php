<?php
$tituloPagina = "Carrito";
$pagina = "carrito";
include ('header.php');
include('con_bd.php');


if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

  $subtotal = $total_p_producto = 0;
  $iva = $total = 0.0;

// if (isset ($_SESSION['user_id'])) {

    $query_registros = "SELECT p.id_producto, nombre, fabricante, COUNT(nombre) as cantidad, imagen, precio
                        FROM productos p, carrito c
                        WHERE p.id_producto = c.id_producto and id_usuario = '$_SESSION[user_id]'
                        GROUP by fabricante;";
    $resultado=mysqli_query($conn,$query_registros);

    // if (isset($resultado)) { //Verificamos que se haya obtenido un resultado

    // }else {//Caso de error regresamos a carrito
        // header("Location: carrito.php");
        // exit();
    // }


//


?>

<link rel="stylesheet" href="../css/carrito.css">
	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-lg-8">
			        <div class="main-heading">Carrito de compras</div>
			        <div class="table-cart">
	                    <table>
	                        <thead>
	                            <tr>
	                                <th>Producto</th>
	                                <th>Cantidad</th>
	                                <th>Total</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tbody>

                            <?php while ($row = $resultado->fetch_array()) {?>

	                            <tr>
	                                <td>
	                                	<div class="display-flex align-center">
		                                    <div class="img-product">
		                                      <a href="<?php echo 'detalle_producto.php?id='.$row['id_producto'];?>"><img src="<?php echo "../img/celulares/".$row['imagen']; ?>" alt="" class="mCS_img_loaded" ></a>
		                                    </div>
		                                    <div class="name-product">
		                                        <?php echo $row['nombre']; ?>
		                                        <br><?php echo $row['fabricante']; ?>
		                                    </div>
		                                    <div class="price">
                                          <?php
                                          if(strlen($row['precio']) < 5) {
                                            echo '$'.substr($row['precio'], -4,-3).','.substr($row['precio'], 1).'.00';
                                          }else {
                                            echo '$'.substr($row['precio'], 0, 2).','.substr($row['precio'],-3).'.00';
                                          }
                                          ?>
		                                    </div>
	                                    </div>
	                                </td>
	                                <td class="product-count">
	                                      <form action="#aregar" class="count-inlineflex">
                  										    <!-- <div class="qtyminus">-</div> -->
                                            <a class="qtyminus" href="<?php echo 'quitar_producto.php?id='.$row['id_producto'];?>">-</a>
                  										    <input type="text" name="quantity" value="<?php echo $row['cantidad']; ?>" class="qty">
                  										    <!-- <div class="qtyplus">+</div> -->
                                          <a class="qtyplus" href="<?php echo 'agregar_producto.php?id='.$row['id_producto'];?>">+</a>
										                    </form>
	                                </td>
	                                <td>
	                                    <div class="total" id ="t_producto">

                                        <?php
                                        $total_p_producto = $row['cantidad']*$row['precio'];
                                        $subtotal = $subtotal + $total_p_producto;
                                        // echo $total_p_producto;
                                        if (strlen($total_p_producto) == 6 )  {
                                          echo '$'.substr($total_p_producto, 0, 3).','.substr($total_p_producto, -3).'.00';

                                        }else if(strlen($total_p_producto) == 5) {
                                          echo '$'.substr($total_p_producto, 0, 2).','.substr($total_p_producto,-3).'.00';

                                        }else {
                                          echo '$'.substr($total_p_producto, -4,-3).','.substr($total_p_producto, 1).'.00';
                                        }

                                        ?>
	                                    </div>
	                                </td>

                                  <td class="product-count">
                                    <a href="<?php echo 'eliminar_producto.php?id='.$row['id_producto'];?>"> <span class="fas fa-trash-alt" ></span>

                                  </td>
	                            </tr>

                            <?php } ?>
	                        </tbody>
	                    </table>
	                    <div class="coupon-box">
	                        <form action="#" method="get" accept-charset="utf-8">
	                            <div class="coupon-input">
	                                <input type="text" name="coupon code" placeholder="Código">
	                                <button type="submit" class="round-black-btn">Aplicar cupón</button>
	                            </div>
	                        </form>
	                    </div>
			        </div>
			        <!-- /.table-cart -->
			    </div>
			    <!-- /.col-lg-8 -->
			    <div class="col-lg-4">
			        <div class="cart-totals">
			            <h3>Total de carrito</h3>
			            <form action="#" method="get" accept-charset="utf-8">
			                <table>
			                    <tbody>
			                        <tr>
			                            <td>Subtotal</td>
			                            <td class="subtotal" id = "subtotal">
                                    <?php
                                    if (strlen($subtotal) == 6 )  {
                                      echo '$'.substr($subtotal, 0, 3).','.substr($subtotal, -3).'.00';

                                    }else if(strlen($subtotal) == 5) {
                                      echo '$'.substr($subtotal, 0, 2).','.substr($subtotal,-3).'.00';

                                    }else {
                                      echo '$'.substr($subtotal, -4,-3).','.substr($subtotal, 1).'.00';
                                    }

                                     ?>

                                  </td>
			                        </tr>
                              <tr>
			                            <td>IVA 16%</td>
			                            <td class="subtotal" id = "iva">
                                      <?php
                                       $iva =round($subtotal*0.16,0);

                                       if (strlen($iva) == 6 )  {
                                         echo '$'.substr($iva, 0, 3).','.substr($iva, -3).'.00';

                                       }else if(strlen($iva) == 5) {
                                         echo '$'.substr($iva, 0, 2).','.substr($iva,-3).'.00';

                                       }else if (strlen($iva) == 4){
                                         echo '$'.substr($iva, -4,-3).','.substr($iva, 1).'.00';
                                       }else {
                                         echo '$'.$iva.'.00';
                                       }

                                      ?>
                                  </td>
			                        </tr>
			                        <tr>
			                            <td>Envío</td>
			                            <td class="free-shipping">Envío gratis</td>
			                        </tr>
			                        <tr class="total-row">
			                            <td>Total</td>
			                            <td class="price-total" id = "total_neto">
                                    <?php
                                    $total = $subtotal + $iva;

                                    if (strlen($total) == 6 )  {
                                      echo '$'.substr($total, 0, 3).','.substr($total, -3).'.00';

                                    }else if(strlen($total) == 5) {
                                      echo '$'.substr($total, 0, 2).','.substr($total,-3).'.00';

                                    }else {
                                      echo '$'.substr($total, -4,-3).','.substr($total, 1).'.00';
                                    }

                                     ?>
                                  </td>
			                        </tr>
			                    </tbody>
			                </table>
			                <div class="btn-cart-totals">

                        <a href="carrito.php" class="checkout round-black-btn" title="">Actualizar carrito</a>
                        <?php if ($total>0): ?>
                          <a href="pago.php" class="checkout round-black-btn" title="">Proceder al pago</a>
                        <?php endif; ?>

			                </div>
			                <!-- /.btn-cart-totals -->
			            </form>
			            <!-- /form -->
			        </div>
			        <!-- /.cart-totals -->
			    </div>
			    <!-- /.col-lg-4 -->
			</div>
		</div>
	</div>
