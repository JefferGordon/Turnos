@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('rol.create') }}"> Crear un nuevo rol</a>
            </div>
        
    </div>
</div>

<br>

@if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
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
      
      <th scope="col">ROL</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($rol as $role)
    <tr>
    
      
      <td>{{$role->ROL_DESCRIPCION}}</td>
      <td>
                <form action="{{ route('rol.destroy',$role->ROL_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('rol.show',$role->ROL_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('rol.edit',$role->ROL_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection