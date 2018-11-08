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
                          <h1 class="box-title"> Consulta de Horarios</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="success">
                            <th class="active">Dia</th>
                            <th class="success">Hora</th>
                            <th class="warning">Clase</th>
                            <th class="danger">Grado</th>
                            <th class="success">Nombre Catedratico</th>                        
                          </thead >
                          <tbody class="success">                            
                          </tbody>
                          <tfoot>
                            <th class="active">Dia</th>
                            <th class="success">Hora</th>
                            <th class="warning">Clase</th>
                            <th class="danger">Grado</th>
                            <th class="success">Nombre Catedratico</th>
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
<script type="text/javascript" src="scripts/consultaUno.js"></script>




 
 
 
 
                            