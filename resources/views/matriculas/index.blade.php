@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('matricula.create') }}"> Crear un nueva matrícula</a>
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
      
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">PREFIJO</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($mat as $mat)
    <tr>
    
      
      <td>{{$mat->MAT_DESCRIPCION}}</td>
      <td>{{$mat->MAT_LETRA}}</td>
      <td>{{$mat->MAT_ESTADO}}</td>
      <td>
                <form action="{{ route('matricula.destroy',$mat->MAT_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('matricula.show',$mat->MAT_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('matricula.edit',$mat->MAT_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection