
<?php
$tituloPagina = "Menu";
include ('admin_header.php');


 ?>
    <div  class="page-header">
        <h1> MENÚ ADMINISTRACIÓN </h1>
    </div><br><br><br><br><br>

    <!-- BOTONES -->
    <style type="text/css">

    html, .container, .page-header,  body, .panel-body, .well  {
      background-image: url("../../img/fondos/fondo2.jpg");
    }

      h1 {
        text-align: center;
      }

      .btn {
        height: 100px;
        text-align: center;
        line-height: 3;
         font-size: 20pt;
        font-size:auto;
      }

    </style>

    <div class="container">
        <div class="well">
        	<!-- <div class="col-md-4 col-md-offset-4"> -->
    			  	<div class="panel-body">
    			    	<!-- <form accept-charset="UTF-8" > -->
                        <fieldset>
    			    	  <div class="form-group col-lg-6">
                      <div class="span1">
                          <a href="inventario.php" class="btn btn-warning btn-lg btn-block">
                            <i class="fas fa-warehouse"></i> &nbsp;
                              <span><strong>INVENTARIO</strong></span>
                          </a>
                      </div>
    			    		</div>

    			    		<div class="form-group col-lg-6">
                    <div class="span1">
                        <a href="agregar_producto.php" class="btn btn-success btn-lg btn-block">
                            <i class="fas fa-plus"></i> &nbsp;
                            <span><strong> AGREGAR PRODUCTOS</strong></span>
                        </a>
                    </div>
    			    		</div>
                  <div class="form-group col-lg-6">
                    <div class="span1">
                        <a href="modificar_menu.php" class="btn btn-info btn-lg btn-block">
                            <i class="fas fa-pencil-alt"></i> &nbsp;
                            <span><strong> MODIFICAR PRODUCTOS</strong></span>
                        </a>
                    </div>
    			    		</div>
                  <div class="form-group col-lg-6">
                    <div class="span1">
                        <a href="admin_historial.php" class="btn btn-danger btn-lg btn-block">
                            <i class="fas fa-history"></i> &nbsp;
                            <span><strong>HISTORIAL</strong></span>
                        </a>
                    </div>
    			    		</div>
                  <fieldset>
    			    </div>
    			</div>
    		<!-- </div> -->
    	</div>
    </div>

     <!-- /BOTONES -->
