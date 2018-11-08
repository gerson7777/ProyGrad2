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
                          <h1 class="box-title"> Pagos por Mes <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                        <br>
                        <br>
                        <label>Coloque el nombre del alumno en el buscador</label>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="success">
                            <th class="active">Opciones</th>
                            <th class="success">Alumno</th>
                            <th class="warning">Mes</th>
                            <th class="danger">Pago</th>
                             <th class="danger">Fecha</th>
                            <th>Estado</th>
                          </thead >
                          <tbody class="success">                            
                          </tbody>
                          <tfoot>
                           <th class="active">Opciones</th>
                            <th class="success">Alumno</th>
                            <th class="warning">Mes</th>
                            <th class="danger">Pago</th>
                             <th class="danger">Fecha</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                           <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nota: Los campos que aparecen con un asterisco son obligatorios</label>
                          </div>
                           
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Alumno:(*)</label>
                            <input type="hidden" name="idcancelado" id="idcancelado">
                            <select id="idalumno" name="idalumno" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Mes:(*)</label>
                            <select id="idmes" name="idmes" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                           
                           

                         
                          
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado:(*)</label>
                            <select class="form-control select-picker" name="estado" id="estado" required>
                              <option value="Cancelado">Cancelado</option>
                              <option value="Espera">Esperado por 15 dias Más</option>
                              <option value="Deudor">Deudor</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                  
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/cancelado.js"></script>



