<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<title>Administación</title>

<style type="text/css">

  body{padding-top:13%;}


</style>

<?php include("admin_login.php"); ?>

<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">

			    	<h3 class="panel-title"> <span><i class="fas fa-toolbox"></i></span>  ADMINISTRACIÓN</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Correo" name="correo" type="text" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="contra" type="password"  required>
			    		</div>

			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Iniciar sesión">
			    	</fieldset>
			     </form>
			    </div>
          <div class= "<?php echo $error1 ?>">

            <strong ><?php echo $error2 ?></strong>
          </div>
			</div>
		</div>
	</div>
</div>
