
<?php
$tituloPagina = "Checkout";
$pagina = "checkout";
include('header.php');
include('con_bd.php');
if(!$conn)
  { echo "no se conecto a la base\n";
    exit;}


function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
}

$tarjeta_correcta;
$cvv_correcto;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["tarjeta"]) || strlen($_POST["tarjeta"]) < 16 ||  strlen($_POST["tarjeta"]) > 16) {
          $tarjeta_correcta = false;
        } else {
          $tarjeta_correcta = true;
        }
        if (empty($_POST["cvv"]) || strlen($_POST["cvv"]) < 3 ||  strlen($_POST["cvv"]) > 3) {
          $cvv_correcto = false;
        } else {
          $cvv_correcto = true;
        }
}

?>

<?php if ($tarjeta_correcta && $cvv_correcto) {

    $hoy = getdate($timestamp = time());
    $fecha = $hoy['mday'].'/'.$hoy['month'].'/'.$hoy['year'];

    $query_carrito = "SELECT id_producto
                      FROM carrito
                      WHERE  id_usuario  = '$_SESSION[user_id]';";
    $resultado=mysqli_query($conn,$query_carrito);

    while ($carrito = $resultado->fetch_array()) {

        $insertar_query = "INSERT INTO historial (id_usuario, id_producto, fecha_compra)
                          VALUES ('$_SESSION[user_id]','$carrito[id_producto]','$fecha');";

        mysqli_query($conn,$insertar_query);
    }

    $limpiar_carrito = "DELETE FROM carrito WHERE id_usuario = '$_SESSION[user_id]';";
    mysqli_query($conn,$limpiar_carrito);

    $direccion = "SELECT *  FROM usuarios  WHERE id_usuario = '$_SESSION[user_id]';";
    $resultado_direccion = mysqli_query($conn,$direccion);
    $envio = $resultado_direccion->fetch_array();

?>

<link rel="stylesheet" href="../css/checkout.css">


    <h1>Información de envío</h1>
    <div class="container">
      <div  class="well" id = "register">
        <h4>Dirección de Envío</h4>
        <br>
        <h5>Para: <?php echo $envio["nombre_usuario"] ?></h5><br>
        <h5>Calle: <?php echo $envio["calle"] ?></h5><br>
        <h5>Colonia: <?php echo $envio["colonia"] ?></h5><br>
        <h5>Código postal: <?php echo $envio["postal"] ?></h5><br>
        <h5>Fecha de entrega: Mañana </h5><br>
        <h5>Número de rastreo: #1324SFSVSD323435</h5><br>
      </div>

      <div class= "alert alert-success fade in text-center">
        <strong >¡Pago existoso! </strong>
      </div>

      <form class="" action="index.php" method="post">
        <button type="submit"  class="btn btn-info btn-lg"
        name="button" onclick="registro.php"> Seguir comprando</button>
      </form>
    </div>



<?php }else { ?>
<style type="text/css">

h1{
  text-align: center;
  color: black;
}

form {
  text-align: center;
}
</style>
  <h1>Error al procesar el pago</h1>
    <div class="container">
      <div class= "alert alert-danger fade in text-center">
        <strong >¡Oh no!, hubo un error al procesar tu pago, maybe no tienes dinero, por favor inténtalo más tarde. </strong>
      </div>

      <form class="" action="carrito.php" method="post">
        <button type="submit"  class="btn btn-info btn-lg"
        name="button" onclick="registro.php"> Volver al carrito </button>
      </form>
    </div>
  </div>


<?php } ?>
