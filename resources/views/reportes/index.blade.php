@extends('menu/index')
@section('content')
<div class="main-panel">
<div class="content-wrapper"> 
<div class="soporte">
<div class="card">
<div class="list-group">
<a href="#" class="list-group-item list-group-item-action active">
Reportes
</a>

<a class="list-group-item list-group-item-action" data-toggle="collapse" href="#Soportes" role="button" aria-expanded="false" aria-controls="collapseExample">
Turnos
</a>
<div class="collapse" id="Soportes">
<div class="card card-body">
<a href="{{ url('/personaform') }}" class="list-group-item list-group-item-action" >Reportes por personas</a>
<a href="{{ url('/fechaform') }}" class="list-group-item list-group-item-action" >Reportes por fecha</a>
<a href="{{ url('/periodoform') }}" class="list-group-item list-group-item-action" >Reportes por periodo</a>
<a href="{{ url('/matriculaform') }}" class="list-group-item list-group-item-action" >Reportes por matricula</a>

<a href="{{ url('/reportegeneral') }}" class="list-group-item list-group-item-action" >General</a>
</div>
</div>
</div></div></div></div></div>










@endsection
