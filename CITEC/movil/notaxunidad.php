<?php

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
                          <h1 class="box-title">Notas</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Escriba Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="100" placeholder="Usuario" required>
                          </div>
                      
                        
                        <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Unidad</label>
                          <select name="idunidad" id="idunidad" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                        </div>
                         <div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-12">
                          <button class="btn btn-primary .btn-sm" onclick="listar()">Mostrar</button>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>Alumno</th>
                           <th>Unidad</th>
                            <th>Clase</th>
                            <th>Nota</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Alumno</th>
                            <th>Unidad</th>
                            <th>Clase</th>
                            <th>Nota</th>
                          </tfoot>
                        </table>
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

<script type="text/javascript" src="scripts/notasxunidad.js"></script>


