@if (session()->get('id')!=null)


@else
<script>
window.location.replace('Logica/error.php');
</script>

@endif
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISTEMA DE TURNOS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('recursos/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('recursos/css/bootstrap.css')}}">

    


    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('recursos/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('recursos/css/fontastic.css')}}">
        <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('recursos/css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('recursos/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
       <!-- Alertas modal-->
       <link rel="stylesheet" href="{{asset('recursos/css/sweetalert.css')}}">
   
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('recursos/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('recursos/css/tablas.css')}}">

   <link rel="stylesheet" href="{{asset('recursos/css/style.default.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('recursos/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('recursos/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('recursos/img/itsco.jpg')}}">
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar menu">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!--Info Usuario-->
          <div class="sidenav-header-inner text-center"><h2 class="h5"> 
          <?php



$nombre="";
$rol="";
$id="";

$sesion=session()->has('id');

if(!$sesion){
  
  header('Location: Logica/error.php');
}else{
  
  $nombre=session()->get('nombre');
  $rol=session()->get('rol');
  $id=session()->get('id');

}

echo $nombre;
?>


</h2><h3>
  @if (session()->get('id')!=null)

 {{ session()->get('rol') }}
 
 @endif
</h3>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-headers-logo"><a href="index.html" class="brand-small text-center"> 
            <strong></strong><strong class="text-primary">pa</strong></a></div>
        </div>




        <!-- Menu-->
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú <?php  
        
          
          echo  $rol;
        
       
            ?></li>
       

 <li class="treeview">
 <?php  if($rol=="Administrador")
 {
   
   ?>
          <a href="#">
            <i class="fa fa-edit"></i> <span> <font size="2">SEGURIDAD</font></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
<?php
}
?>
          <ul class="treeview-menu">
          <li><a href="{{url('/usuario/')}}"> <i class="icon icon-user"></i>Usuarios</a></li>
                
                </ul>
        </li>
        <li class="treeview">
        <?php  if($rol=="Administrador")
 {
   
   ?>
          <a href="#">
            <i class="fa fa-edit"></i> <span>  <font size="2">MANTENIMIENTO</font></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php
}
?>
          <ul class="treeview-menu">
          <li><a href="{{ url('/genero/') }}"><i class=" user-shield"></i>Géneros</a></li>
          <li><a href="{{ url('/modulo/') }}"><i class=" user-shield"></i>Módulos</a></li>     
          <li><a href="{{ url('/persona/') }}"><i class=" user-shield"></i>Personas</a></li> 
          <li><a href="{{ url('/matricula/') }}"><i class=" user-shield"></i>Matrículas</a></li> 
          <li><a href="{{ url('/periodo/') }}"><i class=" user-shield"></i>Períodos</a></li> 
          <li><a href="{{ url('/periodomatricula/') }}"><i class=" user-shield"></i>Períodos-Matrículas</a></li> 

                </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>  <font size="2">TURNOS</font></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
          <li><a href="{{ url('principal') }}"><i class=" user-shield" ></i>Panel de control</a></li> 
                </ul>
        </li>
        <li class="treeview">
        <?php  if($rol=="Administrador")
 {
   
   ?>
          <a href="#">
            <i class="fa fa-edit"></i> <span>  <font size="2">REPORTES</font></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php
}
?>
          <ul class="treeview-menu">
          <li><a href="{{ url('/reporte') }}"><i class=" user-shield"></i>Turnos</a></li> 
                </ul>
        </li>
 </ul>
 </div>
  </nav>
   

  
   <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class=""> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span> </span><strong class="text-danger"></strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <!-- Salir-->
                <li class="nav-item"><a href="{{url('logout')}}" class="nav-link logout"> <span class="d-none d-sm-inline-block">Salir</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="container-fluid">
    <!-- Content Header (Page header) -->
    
<div class="contenido">
@yield('content')

</div>
    <!-- Main content -->
   
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
      

     
      
    </div>
    <!-- JavaScript files-->


<script src="{{asset('recursos/js/validarcedula.js')}}"></script>

    <script  src="{{asset('recursos/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script  src="{{asset('recursos/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script  src="{{asset('recursos/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script  src="{{asset('recursos/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script  src="{{asset('recursos/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script  src="{{asset('recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script  src="{{asset('recursos/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<!-- ChartJS -->
<script  src="{{asset('recursos/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script  src="{{asset('recursos/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script  src="{{asset('recursos/dist/js/demo.js')}}"></script>
    <script src="{{asset('recursos/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('recursos/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('recursos/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('recursos/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('recursos/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('recursos/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('recursos/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('recursos/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('recursos/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('recursos/js/main.js')}}"></script>
    <script src="{{asset('recursos/js/BuscadorTabla.js')}}"></script>
    
    <script src="{{asset('recursos/js/imprimir.js')}}"></script>
<!-- alerta modal -->
    <script src="{{asset('recursos/js/sweetalert.min.js')}}"></script>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  
  </body>
</html>