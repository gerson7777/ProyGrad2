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
                          <h1 class="box-title">Quejas:</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                  
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                           <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nota: La queja esta totalmente bajo anonimato, por lo que no debe de preocuparse
                            por su identidad. </label>
                          </div>
                           

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:(*)</label>
                            
                               <textarea type="text" class="form-control" name="descripcion" id="descripcion" maxlength="400" placeholder="Escriba su queja" rows="6"  required></textarea>
                          </div>
                          
                        

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

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
<script type="text/javascript" src="scripts/queja.js"></script>
