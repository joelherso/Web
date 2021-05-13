<?php
$tituloPagina = "Nosotros";
$pagina = "nosotros";
include ('header.php');
$_SESSION['pagina'] = "nosotros.php";
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <link rel="stylesheet" href="../css/nosotros.css">
    <div class="jumbotron">
      <div class="container">
        <h1>Nosotros</h1>
        <p>Somos una compañia que roba celulares</p>
      </div>
    </div>

    <hr>

    <div class="aboutus-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus">
                            <h2 class="aboutus-title">Sobre nosotros</h2>
                            <p class="aboutus-text">Somos una compañia mundialmente reconocida fundada hace aproximadamente un mes, lo cual es mucho tiempo, lo sabemos. </p>
                            <p class="aboutus-text">Nuestra empresa fue creada con el fin de pasar exitosamente la materia de desarrollo de aplicaciones web.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus-banner">
                            <img src="../img/fondos/fondo6.jpg" class="img-rounded">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="feature">
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="glyphicon fas fa-mobile-alt icon "></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Robo educado</h4>
                                        <p>Nuestros agentes están perfectamente capacitados para robarte sin que te des cuenta,
                                       para impulsar el robo sin violencia y así los ciudadanos no experimenten situaciones traumáticas.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="glyphicon fas fa-american-sign-language-interpreting icon"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Focus</h4>
                                        <p>Nuestro modelo de trabajo está basado en la película de Focus protagonizada por Will Smith y Margot Robbie. Veanla está muy buena.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="glyphicon fas fa-exclamation-triangle icon"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Piezas casi originales y semifuncionales</h4>
                                        <p>Por supuesto que todo esto es una broma, simplemente es para rellenar los espacios. Profesor no me reporte con la universidad, van a pensar que soy rata jajaja, saludos cordiales.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<hr>

<?php include ('footer.php'); ?>
