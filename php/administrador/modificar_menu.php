
<?php
$tituloPagina = "Menu";
include ('admin_header.php');

 ?>
    <div  class="page-header">
        <h1> <span>  <i class="fas fa-pencil-alt"></i></span> MODIFICAR </h1>
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
                          <a href="editar.php" class="btn btn-info btn-lg btn-block">
                            <i class="far fa-edit"></i> &nbsp;
                              <span><strong>EDITAR PRODUCTO</strong></span>

                          </a>
                      </div>
    			    		</div>

    			    		<div class="form-group col-lg-6">
                    <div class="span1">
                        <a href="eliminar.php" class="btn btn-danger btn-lg btn-block">
                          <i class="fas fa-trash-alt"></i> &nbsp;
                            <span><strong> ELIMINAR PRODUCTOS</strong></span>
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
