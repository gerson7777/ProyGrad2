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
                          <h1 class="box-title">Mateniemiento de Alumnos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Año</th>
                            <th>Grado</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Sexo</th>
                            <th>Tel</th>
                            <th>Dirección</th>
                            <th>Usuario</th>
                            <th>Código Personal</th>
                             <th>Imagen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Año</th>
                            <th>Grado</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Sexo</th>
                            <th>Tel</th>
                            <th>Dirección</th>
                            <th>Usuario</th>
                            <th>Código Personal</th>
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
                            <label>Año:(*)</label>
                            <input type="hidden" name="idalumno" id="idalumno">
                            <select id="idanio" name="idanio" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Grado:(*)</label>
                            <select id="idgrado" name="idgrado" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Nombre Alumno:(*)</label>
                            <input type="text" class="form-control" name="nombreAlumno" id="nombreAlumno" maxlength="50" placeholder="Nombre Alumno" required>
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Apellido:(*)</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" maxlength="256" placeholder="Apellido" required>
                          </div>
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Sexo:(*)</label>
                            <input type="text" class="form-control" name="sexo" id="sexo" maxlength="256" placeholder="Sexo" required>
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Telefono:(*)</label>
                            <input type="text" class="form-control" name="tel" id="tel" maxlength="256" placeholder="Telefono" required>
                          </div>
                          
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Dirección:(*)</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="256" placeholder="Direccion" required>
                          </div>
                          
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Usuario:(*)</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="256" placeholder="Usuario" required>
                          </div>
                          
                          
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Código Personal:(*)</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="256" placeholder="Código Personal" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/alumno.js"></script>



