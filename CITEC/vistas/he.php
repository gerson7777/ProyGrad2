<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header("location:login.php");
}


require 'header.php';
?>

          <div class="container">
              
              <input type="text" id="numeroCorrelativo" placeholder="Número Correlativo" class="form-control my-2">
              <input type="text" id="nombreFamilia" placeholder="Apellidos de Matrimonio" class="form-control my-2">
              <input type="date" id="fechaCreacion" placeholder="Fecha de Creación" class="form-control my-2">
              <input type="file" value="upload" id="fileButton" /><br>
              <progress value="0" max="100" id="uploader">0%</progress><br>
              <button class="btn btn-info" id="btnGuardar" onclick="guardar()">Guardar</button>

             
          </div>

              <div class="row">
                <div class="col-md-5"><br></div>
              </div>



          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-archive"></i>
              BÚSQUEDA</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                   
                  </thead>
                  <tfoot >
                    <tr>
                      <th>No. Correlativo</th>
                      <th>Apellidos de Matrimonio</th>
                      <th>Fecha de Creación</th>
                      <th>Archivo</th>
                      <th>Eliminar</th>
                      <th>Editar</th>
                    </tr>                     
                  </tfoot>
                          <tbody id="tabla">
                          </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

  


<?php

require 'footer.php';
?>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-firestore.js"></script>
<script type="text/javascript" src="scripts/app.js"></script>