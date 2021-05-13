<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Registro </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }

        form {
          text-align: center;
        }
        #register {
          text-align: center;
        }

    </style>
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>
  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">E-Shop</a>
   </nav>

    <div class="container">
       <div class="signup-form-container">

            <!-- Inicio del forms -->

            <form role="form" id="register" action ="r_usuario.php" method="POST" >

            <div class="page-header">
             <h3 class="form-title"><i class="fa fa-user"></i> Regístrate</h3>

            </div>
        <div class="well">
            <div class="form-body">
              <div class="form-group ">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="far fa-user"></span></div>
                      <input name="username" type="text" class="form-control" placeholder="Nombre de usuario *" required>
                      </div>
                 </div>

                 <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                      <input name="email" type="email" class="form-control" placeholder="Correo *" required>
                      </div>
                      <span class="help-block" id="error"></span>
                 </div>

                <div class="form-group ">
                      <div class="input-group">
                      <div class="input-group-addon"><span class="far fa-calendar-alt"></span></div>
                      <input name="bday" type="date" class="form-control" placeholder="Calendario" >
                      </div>
                      <span class="help-block" id="error"></span>
                 </div>

                      <div class="row">
                           <div class="form-group col-lg-4">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="fas fa-road"></span></div>
                                <input name="street"  type="text" class="form-control" placeholder="Calle" required>
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                           <div class="form-group col-lg-4">
                                <div class="input-group center">
                                <div class="input-group-addon"><span class="fas fa-map-marker"></span></div>
                                <input name="colony" type="text" class="form-control" placeholder="Colonia" required>
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                           <div class="form-group col-lg-4">
                                <div class="input-group center">
                                <div class="input-group-addon"><span class="fas fa-mail-bulk"></span></div>
                                <input name="postal" type="number" class="form-control" placeholder="Código postal"required>
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                      </div>

                      <div class="row">
                           <div class="form-group col-lg-6">
                                <div class="input-group">
                                <div class="input-group-addon"><span class="fas fa-lock"></span></div>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña *" required>
                                </div>
                                <span class="help-block" id="error"></span>
                           </div>

                           <div class="form-group col-lg-6">
                                <div class="input-group center">
                                <div class="input-group-addon"><span class="fas fa-lock"></span></div>
                                <input name="cpassword" type="password" class="form-control" placeholder="Reescribe contraeña *" required>
                                </div>
                                <span class="help-block" id="error"></span>
                      </div>

               </div>
             </div>

                    <button type="submit" class="btn btn-info btn-lg">
                    <span class="fas fa-user-plus"></span> Enviar
                    </button>

    </form>


    </div>


  </body>


</html>
