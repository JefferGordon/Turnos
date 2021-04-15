@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('persona.create') }}"> Crear Persona</a>
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
      
      <th scope="col">NOMBRES</th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">CÉDULA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">Accion</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($persona as $per)
    <tr>
    
      
      <td>{{$per->PER_NOMBRES}}</td>
      <td>{{$per->PER_APELLIDOS}}</td>
      <td>{{$per->PER_CEDULA}}</td>
      <td>{{$per->PER_ESTADO}}</td>
      <td>
                <form action="{{ route('persona.destroy',$per->PER_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('persona.show',$per->PER_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('persona.edit',$per->PER_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection