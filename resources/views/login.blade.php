<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de turnos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="recursos/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="recursos/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
  
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="recursos/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="recursos/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="recursos/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="recursos/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="recursos/img/itsco.jpg">
    <link rel="shortcut icon" href="recursos/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
  <style>
   body{
    background-image: url("recursos/img/fondoLogo.png");
    height: 100%;
        width: 95%;
        background-repeat: no-repeat;
			  background-size: cover;
			  position: relative;
  }
  
  </style>

 
    <div class="page login-page">
      <div class="container">
      @if ($message = Session::get('success'))
        <div class="alert alert-danger" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Advertencia!</strong> Corrija los siguientes errores:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>SISTEMA DE TURNOS</span><strong class="text-primary">ITSCO</strong></div>
            
        <form action="{{ route('login.store') }} "method="post"> 
            <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" name="txtuser" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese usuario" value="{{old('txtuser')}}">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="txtpass" class="form-control " id="exampleInputPassword1" placeholder="Ingrese clave" value="{{old('txtpass')}}">
    
  </div>
  <button type="submit" class="btn btn-primary">Ingresar</button>
              

            </form>
        </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="recursos/vendor/jquery/jquery.min.js"></script>
    <script src="recursos/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="recursos/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="recursos/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="recursos/vendor/chart.js/Chart.min.js"></script>
    <script src="recursos/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="recursos/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="recursos/js/front.js"></script>
  </body>
</html>