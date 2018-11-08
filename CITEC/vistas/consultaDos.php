<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header("location:login.php");
}


require 'header.php';
?>
      <div class="content-wrapper">        
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"> Consulta de Notas Generales</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="success">
                            <th class="active">Clase</th>
                            <th class="success">Alumno</th>
                            <th class="warning">Unidad</th>
                            <th class="danger">Fecha</th>
                            <th class="success">Nota</th>                        
                          </thead >
                          <tbody class="success">                            
                          </tbody>
                          <tfoot>
                            <th class="active">Clase</th>
                            <th class="success">Alumno</th>
                            <th class="warning">Unidad</th>
                            <th class="danger">Fecha</th>
                            <th class="success">Nota</th>
                          </tfoot>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </div>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/consultaDos.js"></script>

