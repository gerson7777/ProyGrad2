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
                          <h1 class="box-title"> Mateniemiento de Días <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="success">
                            <th class="active">Opciones</th>
                            <th class="success">Clase</th>
                            <th class="warning">Hora</th>
                            <th class="danger">Nombre</th>
                            <th>Estado</th>
                          </thead >
                          <tbody class="success">                            
                          </tbody>
                          <tfoot>
                            <th class="active">Opciones</th>
                            <th class="success">Clase</th>
                            <th class="warning">Hora</th>
                            <th class="danger">Nombre</th>
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
                            <label>Clase:(*)</label>
                            <input type="hidden" name="iddia" id="iddia">
                            <select id="idasignatura" name="idasignatura" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Horario:(*)</label>
                            <select id="idhorario" name="idhorario" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                           
                           

                           
                                                    
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dia:(*)</label>
                            <select class="form-control select-picker" name="nombre" id="nombre" required>
                              <option value="Lunes">Lunes</option>
                              <option value="Martes">Martes</option>
                              <option value="Miercoles">Miercoles</option>
                               <option value="Jueves">Jueves</option>
                              <option value="Viernes">Viernes</option>
                              <option value="Sabado">Sabado</option>
                                 <option value="Domingo">Domingo</option>
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
<script type="text/javascript" src="scripts/dia.js"></script>



