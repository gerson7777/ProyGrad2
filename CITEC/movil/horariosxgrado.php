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
                          <h1 class="box-title">Horarios</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        
                        <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Grado</label>
                          <select name="idgrado" id="idgrado" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                        </div>
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label></label>
                        </div>
                         <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <button class="btn btn-primary .btn-sm" onclick="listar()">Mostrar</button>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>Día</th>
                           <th>Hora</th>
                            <th>Clase</th>
                            <th>Grado</th>
                            <th>Catedrático</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Día</th>
                            <th>Hora</th>
                            <th>Clase</th>
                            <th>Grado</th>
                            <th>Catedrático</th>
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

<script type="text/javascript" src="scripts/horariosxgrado.js"></script>
