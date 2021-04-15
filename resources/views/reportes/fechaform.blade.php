@extends('menu/index')
@section('content')

<div class="main-panel">
          <div class="content-wrapper"> 
         
              
             
              
              
           <div class="soporte">
            <div class="card">
                <div class="card-header " id="cabecera">
  Seleccione fechas
  </div>
  <div class="card-body">
     
      <form action="{{url('/reportefecha')}}" method="GET">    

    <div class="form-group">
    <label for="">Desde:</label>
    <input class="form-control" required="" type="date" name="desde"  value=""/>
    
  </div>  
          
       <br>
  <div class="form-group">
    <label for="">Hasta:</label>
    <input class="form-control" required="" type="date" name="hasta"  value=""/>
    
  </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Guardar">
      
     </div>
        </form>
      
  </div>
</div>
           </div>
          

          
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      @endsection