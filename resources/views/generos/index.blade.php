@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('genero.create') }}"> Crear un nuevo género</a>
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
      
      <th scope="col">GÉNERO</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($genero as $gen)
    <tr>
    
      
      <td>{{$gen->GEN_DESCRIPCION }}</td>
      <td>
                <form action="{{ route('genero.destroy',$gen->GEN_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('genero.show',$gen->GEN_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('genero.edit',$gen->GEN_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection