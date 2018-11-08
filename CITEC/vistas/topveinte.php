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
                          <h1 class="box-title">Top Veinte</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="success">
                            <th class="active">Alumno</th>
                            <th class="success">Promedio</th>
                                                 
                          </thead >
                          <tbody class="success">                            
                          </tbody>
                          <tfoot>
                            <th class="active">Alumno</th>
                            <th class="success">Promedio</th>
                          
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
<script type="text/javascript" src="scripts/topveinte.js"></script>




 
 
 
 
                            