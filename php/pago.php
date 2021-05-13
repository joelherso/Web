<?php
$tituloPagina = "Pago";
$pagina = "pago";

include('header.php');
include('con_bd.php');


if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

  $subtotal = $total_p_producto = 0;
  $iva = $total = 0.0;


    $query_registros = "SELECT p.id_producto, nombre, fabricante, COUNT(nombre) as cantidad, imagen, precio
                        FROM productos p, carrito c
                        WHERE p.id_producto = c.id_producto and id_usuario = '$_SESSION[user_id]'
                        GROUP by fabricante;";
    $resultado=mysqli_query($conn,$query_registros);




?>


<link rel="stylesheet" href="../css/pago.css">
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="checkout.php">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--ORDEN DE COMPRA-->
                    <div class="compra-panel">


                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <span><i class="fas fa-shopping-bag"></i></span>  Orden de compra <div class="pull-right"><small><a class="afix-1" href="carrito.php">Editar Carrito</a></small></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">

                              <?php while ($row = $resultado->fetch_array()) {?>
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?php echo "../img/celulares/".$row['imagen']; ?>"  />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?php echo $row['nombre']; ?></div>
                                    <div class="col-xs-12"><small>Cantidad: <?php echo $row['cantidad']; ?></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>
                                      <?php
                                      $total_p_producto = $row['cantidad']*$row['precio'];
                                      $subtotal = $subtotal + $total_p_producto;
                                      if(strlen($row['precio']) < 5) {
                                        echo '$'.substr($row['precio'], -4,-3).','.substr($row['precio'], 1).'.00';
                                      }else {
                                        echo '$'.substr($row['precio'], 0, 2).','.substr($row['precio'],-3).'.00';
                                      }
                                      ?>
                                    </h6>
                                </div>
                                <div class="form-group"><hr /></div>
                              <?php } ?>


                            </div>

                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Total de la orden</strong>
                                    <div class="pull-right"><span>
                                      <?php
                                          $iva =round($subtotal*0.16,0);
                                          $total = $subtotal + $iva;

                                          if (strlen($total) == 6 )  {
                                            echo '$'.substr($total, 0, 3).','.substr($total, -3).'.00';

                                          }else if(strlen($total) == 5) {
                                            echo '$'.substr($total, 0, 2).','.substr($total,-3).'.00';

                                          }else {
                                            echo '$'.substr($total, -4,-3).','.substr($total, 1).'.00';
                                          }

                                       ?>
                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    <!--ORDEN DE COMPRA END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">

                    <!--PAGO TARJETA-->
                    <div class="panel panel-info">

                        <div class="panel-heading"><span><i class="fas fa-user-lock"></i></span>  Pago seguro</div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tarjeta:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control" required>
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Numero de tarjeta:</strong></div>
                                <div class="col-md-12"><input type="number" class="form-control" name="tarjeta"min = "0" / required></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>CVV:</strong></div>
                                <div class="col-md-12"><input type="number" class="form-control" name="cvv" min = "0"/ required></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Fecha de vencimiento</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="" required>
                                        <option value="">Mes</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="" required>
                                        <option value="">Año</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                          <div class="form-group"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix btn-lg">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PAGO TARJETA END-->
                </div>

                </form>
            </div>
            <div class="row cart-footer">
            </div>
    </div>
