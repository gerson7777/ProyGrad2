<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header("location:login.php");
}


require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Mateniemiento de Catedrático <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre Catedrático</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Dni</th>
                            <th>Profesion</th>
                            <th>Usuario</th>
                             <th>Imagen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre Catedrático</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Dni</th>
                            <th>Profesion</th>
                            <th>Usuario</th>
                             <th>Imagen</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nota: Los campos que aparecen con un asterisco son obligatorios</label>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Nombre Catedrático:(*)</label>
                            <input type="hidden" name="idcatedratico" id="idcatedratico">
                            <input type="text" class="form-control" name="nombreCatedratico" id="nombreCatedratico" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Apellido:(*)</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" maxlength="256" placeholder="Apellido">
                          </div>
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Correo:(*)</label>
                            <input type="text" class="form-control" name="correo" id="correo" maxlength="256" placeholder="Correo">
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>DNI:(*)</label>
                            <input type="text" class="form-control" name="dni" id="dni" maxlength="256" placeholder="Dni">
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Profesion:(*)</label>
                            <input type="text" class="form-control" name="profesion" id="profesion" maxlength="256" placeholder="Profesion">
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Usuario:(*)</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="256" placeholder="Usuario">
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Contraseña:(*)</label>
                            <input type="text" class="form-control" name="clave" id="clave" maxlength="256" placeholder="Contraseña">
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>
                        
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/catedratico.js"></script>



