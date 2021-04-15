@extends('menu/index')
@section('content')

@if (session()->get('id')!=null)


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <a class="btn btn-success" href="{{ route('usuario.create') }}"> Crear un nuevo usuario </a>
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
      
      <th scope="col">USUARIO</th>
      <th scope="col">ROL</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach($usuario as $user)
    <tr>
    
      <td>{{$user->USU_LOGIN}}</td>
      <td>{{$user->USU_ROL}}</td>
      <td>
                <form action="{{ route('usuario.destroy',$user->USU_ID) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('usuario.show',$user->USU_ID) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('usuario.edit',$user->USU_ID) }}">Edit</a>
   
                    
                    {{method_field('DELETE')}}
      <input type="submit" value="Eliminar" class="btn btn-danger">
                  
                </form>
            </td>
    
    </tr>
  
    @endforeach
  </tbody>
</table>
@endif


@endsection