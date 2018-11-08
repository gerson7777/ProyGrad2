<?php

session_start();
if (isset($_SESSION["usuario"])) {
  header("location:index.php");
}

?>
<!DOCTYPE html>
<html class="hola">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CITEC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>CITEC</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos de Acceso</p>
        <form method="post" id="frmAcceso">
          <div class="form-group has-feedback">
            <label for="usuario">Usuario o Correo</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
            <span class="fa fa-user-secret form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="clave">Contraseña</label>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña">
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="button" name="login" id="login" value="Entrar" class="btn btn-success active"type=" button" value="My Bootstrap Button">
              
              <br>
              
            </div><!-- /.col -->
             <br>
             <br>
            <span id="result"></span>
          </div>
        </form>

        
      <!--  <a href="#">Olvidé mi password</a><br> -->
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>

    <script type="text/javascript" src="scripts/login.js"></script>


  </body>
</html> 
<script>
  $(document).ready(function() {
    $('#login').click(function(){
      var usuario = $('#usuario').val();
      var clave = $('#clave').val();
      if($.trim(usuario).length > 0 && $.trim(clave).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:{usuario:usuario, clave:clave},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Entrar");
            if (data=="1") {
              $(location).attr('href','index.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Credenciales son incorrectas.</div>");
            }
          }
        });
      };
    });
  });
</script>


