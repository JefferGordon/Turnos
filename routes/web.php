<?php

 //Clear route cache:
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});



Route::get('/', function () {
    return view('login');
});
Route::get('guardarturnos/{id}', function ($id) {
    return view('guardarturnos').$id;
});
Route::view('/reportegeneral', 'reportes/todo');
Route::view('/matriculaform', 'reportes/matriculaform');
Route::view('/fechaform', 'reportes/fechaform');
Route::view('/periodoform', 'reportes/periodoform');
Route::view('/personaform', 'reportes/personasform');
Route::view('/reportematricula', 'reportes/matricula');
Route::view('/reportetodo', 'reportes/todo');
Route::view('/reporteperiodo', 'reportes/periodos');
Route::view('/reportefecha', 'reportes/fecha');
Route::view('/reportepersona', 'reportes/turnos');
Route::view('/reporte', 'reportes/index');
Route::view('/turnos', 'controlusuario');
Route::view('/vistaturnos2', 'turnos/vistaturnos2');
Route::resource('usuario','UsuarioController');
Route::resource('modulo','ModulosController');
Route::resource('servicio','ServiciosController');
Route::resource('persona','PersonasController');
Route::resource('login','Usuario');
Route::resource('logout','UsuarioSalir');
Route::resource('periodomatricula','PeriodosmatriculasController');
Route::resource('empresa', 'EmpresaController');


Route::view('/vista', 'turnos/vistaturnos');

Route::view('/principal', 'turnos/principal');
Route::view('/principal2', 'turnos/principal2');

Route::get('show', function () {
    return view('usuarios/show');
});
//Route::get('modulo', 'ModulosController@inactivo');
// agregar nombre
Route::get('moduloInac', 'ModulosController@inactivo')
         ->name('moduloInac.inactivo');
Route::get('servicioInac', 'ServiciosController@inactivo')
         ->name('servicioInac.inactivo');
Route::get('personaInac', 'PersonasController@inactivo')
         ->name('personaInac.inactivo');