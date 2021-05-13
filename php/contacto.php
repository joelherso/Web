<?php
$tituloPagina = "Contacto";
$pagina = "contacto";
include ('header.php');
$_SESSION['pagina'] = "contacto.php";
?>


<style type="text/css">
.jumbotron {
   background-image: url("../img/fondos/fondo4.jpg");
   margin-bottom: 0px;
   background-position: 0% 72%;
   background-size: cover;
   background-repeat: no-repeat;
   color: white;
}
</style>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Contáctanos</h1>
        <p>Cuéntanos como mejorar</p>
      </div>
    </div>
    <hr>

    <div id="contact" class="container">
      <h3 class="text-center">Contacto</h3>
      <p class="text-center"><em>Aceptamos tus sugerencias.</em></p>

      <div class="row">
        <div class="col-md-4">
          <p>¿Sugerencias? Escríbenos</p>
          <p><span class="fas fa-map-marked-alt"></span> CDMX, México </p>
          <p><span class="fas fa-mobile-alt"></span> Phone: +00 1515151515 </p>
          <p><span class="far fa-envelope"></span> Email: mail@mail.com </p>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Correo" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea>
          <br>
          <div class="row">
            <div class="col-md-12 form-group">
              <button class="btn pull-right" type="submit">Enviar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
<hr>

 <?php include ('footer.php'); ?>
