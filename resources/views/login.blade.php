<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Turnero </title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">

 @if ($message = Session::get('error'))
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

    
      <div class="login-box">
        <form class="login-form" action="{{ route('login.store') }} " method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Ingresar al Sistema</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" type="text" placeholder="User" name="usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" type="password"  name="clave" placeholder="Contraseña" value="{{old('txtpass')}}" value="{{old('txtuser')}}">
          </div>
          <div class="form-group">
           
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Aceptar</button>
          </div>
          
        </form>
        
      </div>
      <div class="logo">
        <h1>Turnero V 2.0</h1>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>