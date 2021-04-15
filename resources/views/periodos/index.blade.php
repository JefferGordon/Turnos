@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('periodo.create') }}"> Crear un nuevo período</a>
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
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($per as $per)
    <tr>
    
      
      <td>{{$per->PERI_DESCRIPCION }}</td>
      <td>{{$per->PERI_ESTADO}}</td>
      <td>
                <form action="{{ route('periodo.destroy',$per->PERI_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('periodo.show',$per->PERI_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('periodo.edit',$per->PERI_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection