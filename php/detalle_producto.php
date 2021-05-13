<?php
$tituloPagina = "Productos";
$pagina = "Detalle de producto";
include ('header.php');
include ('mostrar_productos.php');
include('con_bd.php');
$_SESSION['pagina'] = "detalle_producto.php";

if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}

if (isset ($_GET["id"])) {
  $id_producto = $_GET["id"];
  $query_registros = "SELECT * FROM productos WHERE id_producto = $id_producto";
  $resultado=mysqli_query($conn,$query_registros);

  if (isset($resultado)) { //Verificamos que se haya obtenido un resultado
    $row = $resultado->fetch_array();
  }else {//Caso de error regresamos a productos
    header("Location: productos.php");
    exit();
  }

}else {
  header("Location: productos.php");

}

?>


    <link href="http://cdn.shopify.com/s/files/1/0067/5617/1846/t/2/assets/timber.scss.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/detalle_producto.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->

        <body>

        <hr>
        <main>
            <div id="shopify-section-product-template" class="shopify-section">
                <div class="single-product-area mt-80 mb-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-details-large" id="ProductPhoto">
                                    <img src="<?php echo "../img/celulares/".$row['imagen']; ?>" width="500" height="500"  class="product-zoom">
                                </div>

                            </div>
                            <div class="col-md-7">
                                <div class="single-product-content">

                                        <!-- <input  name="form_type" value="product" /><input type="hidden" name="utf8" value="✓" /> -->
                                        <div class="product-details">
                                          <!-- Titulo del producto -->
                                            <h1 style="color:black" ><?php echo $row['nombre']; ?></h1>
                                            <!-- Titulo del producto -->

                                            <!-- FAbricante -->
                                            <div class="product-sku">Fabricante: <span class="variant-sku"><?php echo $row['fabricante']; ?></span></div>
                                              <!-- FAbricante -->

                                                <!-- Precio -->
                                            <div class="single-product-price">
                                                <div class="product-discount"><span  class="price" id="ProductPrice"><span class=money>
                                                  <?php
                                                  if(strlen($row['precio']) < 5) {
                                                    echo '$'.substr($row['precio'], -4,-3).','.substr($row['precio'], 1).'.00';
                                                  }else {
                                                    echo '$'.substr($row['precio'], 0, 2).','.substr($row['precio'],-3).'.00';
                                                  }
                                                  ?></span></span></div>
                                            </div>
                                              <!-- Precio-->

                                              <!-- Descripcion -->
                                            <div class="product-info">
                                                <?php

                                                echo "<h5> $row[descripcion]</h5> <br>";
                                                      echo "<tr>";
                                                        echo "<table class= table >";
                                                        echo "  <th> Color  </th>";
                                                        echo "  <th> Capacidad </th>";
                                                        echo  "  <th> Peso  </th>";
                                                      echo "</tr>";
                                                      echo "<tr>";
                                                        echo "<td>  $row[color] </td>";
                                                        echo "<td>$row[capacidad] </td>";
                                                        echo "<td>$row[peso] </td";
                                                      echo "</tr>";
                                                      echo "</table>";
                                                      echo "<h4> Disponibles: $row[disponibles] </h4> <br>";
                                          ?>
                                            </div>
                                            <!-- Descripcion -->
                                            <br>
                                            <div class="single-product-action">
                                                <!-- <div class="product-variant-option">
                                                    <select name="id" id="productSelect" class="product-single__variants" style="display:none;">
                                                        <option  selected="selected"  data-sku="YQT71020193" value="19506517377094">Default Title - <span class=money>$20.66 USD</span></option>
                                                    </select>
                                                </div> -->
                                                <style>.product-variant-option .selector-wrapper{display: none;}</style>
                                                <form class="" action="<?php echo 'add_cart.php?id='.$id_producto;?>" method="post">
                                                      <div class="product-add-to-cart">
                                                      <span class="control-label">Cantidad</span>
                                                      <div class="cart-plus-minus">
                                                          <input class="cart-plus-minus-box" type="number" name="cantidad" value="1" min="0" id = "cantidad_p">
                                                      </div>
                                                      <div class="add">
                                                          <button type="submit" class="add-to-cart ajax-spin-cart" id="AddToCart" name = "carrito">
                                                              <i class="fas fa-shopping-cart" ></i>
                                                              <span class="list-cart-title cart-title" id="AddToCartText">Añadir</span>
                                                          </button>

                                                  </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </body>
    <!-- </div> -->
    <hr>


<?php include ('footer.php'); ?>
