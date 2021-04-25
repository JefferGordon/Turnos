<?php  

$servicio = DB::select("");

?>

@foreach($servicio as $ser)
    <li class="list-group-item">
      <div class="animated-checkbox">
              <label>
                <input type="checkbox" name="idservicio" value="{{$ser->SER_ID}}"><span class="label-text">{{$ser->SER_DESCRIPCION}}</span>
              </label>
       </div>
       </li>
@endforeach