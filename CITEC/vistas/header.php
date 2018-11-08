<?php


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Colegio CITEC | www.umg.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/Citec.png">
    <link rel="shortcut icon" href="../public/img/Citec.png">
    

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
     <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> -->
     

    
    

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GBMC</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>COLEGIO CITEC</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/img/login.jpg" class="user-image" alt="User Image">
                 <?php echo '<span class="hidden-xs">'.$_SESSION["usuario"].'</span>' ?>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/img/login.jpg" class="img-circle" alt="User Image">
                    <p>
                      GBGP -Desarrollador de Software
                      <small>gersonbreakgonzalez@gmail.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                       <p align=center><a href="logout.php">Cerrar</a></p>
                        <!-- <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>-->
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" data-widget="tree" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            <li class="header">Menu Navegacion</li>
            <li>
              <a href="index.php">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Horarios y Días</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="horario.php"><i class="fa fa-check-circle-o"></i> Horarios</a></li>
                <li><a href="dia.php"><i class="fa fa-check-circle-o"></i> Dias</a></li>
                <li><a href="anio.php"><i class="fa fa-check-circle-o"></i> Años</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-compass"></i>
                <span>Grados y Asignaturas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="grado.php"><i class="fa fa-check-circle-o"></i>Grado</a></li>
                <li><a href="asignatura.php"><i class="fa fa-check-circle-o"></i>Asignatura</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Alumnos y Catedráticos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="alumno.php"><i class="fa fa-check-circle-o"></i> Alumnos</a></li>
                <li><a href="catedratico.php"><i class="fa fa-check-circle-o"></i> Catedráticos</a></li>
                <li><a href="gprofesor.php"><i class="fa fa-check-circle-o"></i> Grados por Maestro</a></li>
                 <li><a href="casignatura.php"><i class="fa fa-check-circle-o"></i>Catedráticos por Asignatura</a></li>
              </ul>
            </li>
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Calificaciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="calasignatura.php"><i class="fa fa-check-circle-o"></i>Admon. Calificaciones</a></li>
                 <li><a href="topveinte.php"><i class="fa fa-check-circle-o"></i>Top 20</a></li>
              </ul>
            </li>
            
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-search"></i>
                <span>Consultas </span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultaUno.php"><i class="fa fa-check-circle-o"></i>Horarios</a></li>
                 <li><a href="consultaDos.php"><i class="fa fa-check-circle-o"></i>Notas</a></li>
                 <li><a href="notafechaalumno.php"><i class="fa fa-check-circle-o"></i>Notas por Fecha</a></li>
                 <li><a href="maestrogrados.php"><i class="fa fa-check-circle-o"></i>Catedráticos por Grado</a></li>
                 <li><a href="notaxunidad.php"><i class="fa fa-check-circle-o"></i>Nota por Unidad</a></li>
                 <li><a href="horariosxgrado.php"><i class="fa fa-check-circle-o"></i>Horarios por Grado</a></li>
                 
                 
              </ul>
            </li>
              <li class="treeview">
              <a href="queja.php">
                <i class="fa fa-smile-o"></i>
                <span>Quejas</span>
              
              </a>
         
            </li>
            
            
             <li class="treeview">
              <a href="cancelado.php">
                <i class="fa fa-bolt"></i>
                <span>Pagos</span>
              </a>
            
            </li>
            
            
             <li class="treeview">
              <a href="manual.php">
                <i class="fa fa-question"></i>
                <span>Ayuda</span>
              </a>
            
            </li>
            
            
            
            
            
            
             
             

           
           
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
