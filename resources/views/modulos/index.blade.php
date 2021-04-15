@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('modulo.create') }}"> Crear un nuevo módulo</a>
            </div>
        
    </div>
</div>

<br>

@if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
@if ($message = Session::get('delete'))
        <div class="alert alert-danger" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<table class="table">
  <thead>
    <tr>
      
      <th scope="col">NÚMERO</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($modulo as $mod)
    <tr>
    
        
    <td>{{$mod->MOD_NUMERO}}</td>
      <td>{{$mod->MOD_DESCRIPCION}}</td>
        
      <td>{{$mod->MOD_ESTADO}}</td>
      <td>
                <form action="{{ route('modulo.destroy',$mod->MOD_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('modulo.show',$mod->MOD_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('modulo.edit',$mod->MOD_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit"  value="Eliminar" class="btn btn-danger">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection