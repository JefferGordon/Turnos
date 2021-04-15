@extends('menu/index')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
                                <a class="btn btn-success" href="{{ route('periodomatricula.create') }}"> Asignar Período-Matrícula</a>
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
      
      <th scope="col">PERÍODO</th>
      <th scope="col">MATRÍCULA</th>
      <th scope="col">FECHA INICIO</th>
      <th scope="col">FECHA FIN </th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIÓN</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($perma as $perma)
    <tr>
    
      
      <td>{{$perma->PERI_DESCRIPCION}}</td>
      <td>{{$perma->MAT_DESCRIPCION}}</td>
      <td>{{$perma->PMAR_FECHAINI}}</td>
      <td>{{$perma->PMAR_FECHAFIN}}</td>
      <td>{{$perma->PMAR_ESTADO}}</td>
      <td>
                <form action="{{ route('periodomatricula.destroy',$perma->PMAR_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('periodomatricula.show',$perma->PMAR_ID) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('periodomatricula.edit',$perma->PMAR_ID) }}">Editar</a>
   
                    {{method_field('DELETE')}}

                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>



</table>

@endsection