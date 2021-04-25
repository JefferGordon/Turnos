<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Servicio;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $sql="SELECT MOD_ID, MOD_DESCRIPCION, MOD_NUMERO FROM tbl_modulos WHERE MOD_ID NOT IN(SELECT MOD_ID FROM tbl_personas) AND MOD_ESTADO='A'";
       $persona= Persona::where("PER_ESTADO","=","A")->paginate(5);
       $modulo= DB::select($sql);
       $servicios = Servicio::where("SER_ESTADO","=","A")->get();


       return view('personas.index', ['persona' => $persona,
       'modulo'=>$modulo,
       'servicio'=>$servicios
       ]);
    }
    public function inactivo()
    {
        //

        
       $persona = Persona::where("PER_ESTADO","=","I")->paginate(5);

       return view('personas.indexInactivo', ['persona' => $persona]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required',
            'apellidos'=> 'required',
            'cedula'=>'required|unique:tbl_personas,per_cedula',
            'correo'=>'required|email|unique:tbl_personas,per_email',
            'genero'=>'required',
            'usuario'=>'required|unique:tbl_personas,per_usuario',
            'clave'=>'required',
            'rol'=>'required',
        ]);
            $persona = new Persona([
            'PER_NOMBRES'=>$request->post('nombre'),
            'PER_APELLIDOS'=>$request->post('apellidos'),
            'PER_CEDULA'=>$request->post('cedula'),
            'PER_EMAIL'=>$request->post('correo'),
            'GEN_ID'=>$request->post('genero'),
            'PER_USUARIO'=>$request->post('usuario'),
            'PER_CLAVE'=>$request->post('clave'),
            'PER_ROL'=>$request->post('rol'),
            'MOD_ID'=>$request->post('modulo'),
            'PER_EMPRESA'=>$request->post('empresa'),

            ]);
            if($persona->save()){

                return redirect()->route('persona.index')->with('success','Usuario guardada con éxito');
            }else{

                return redirect()->route('persona.index')->with('error','Datos no guardados');
            }


   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {

        $persona = DB::select('call proc_personaid(?)',array($persona->PER_ID));
        
        return view('personas.show', ['persona' => $persona]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $combo="call comboModulo($id)";
        $modulo= DB::select($combo);
        $persona= Persona::where("PER_ID","=",$id)->get();
        return view('personas.detalle',compact('persona','modulo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->post('estado') == "A"){
            $estado='A';
        }else{
            $estado='I';
        }
        $request->validate([
            'nombre' => 'required',
            'apellidos'=> 'required',
            'cedula'=>'required|unique:tbl_personas,per_cedula,'.$id.',PER_ID',
            'correo'=>'required|email|unique:tbl_personas,per_email,'.$id.',PER_ID',
            'genero'=>'required',
            'usuario'=>'required|unique:tbl_personas,per_usuario,'.$id.',PER_ID',
            'clave'=>'required',
            'rol'=>'required'

        ]);
        $persona= Persona::find($id);
        
        $persona->PER_NOMBRES = $request->post('nombre');
        $persona->PER_APELLIDOS = $request->post('apellidos');
        $persona->PER_CEDULA = $request->post('cedula');
        $persona->PER_EMAIL = $request->post('correo');
        $persona->GEN_ID = $request->post('genero');
        $persona->PER_USUARIO = $request->post('usuario');
        $persona->PER_CLAVE = $request->post('clave');
        $persona->PER_ROL = $request->post('rol');
        $persona->MOD_ID = $request->post('modulo');
        $persona->PER_ESTADO = $estado;

        if($persona->save()){
            return redirect()->route('persona.index')->with('success','Persona actualizada con éxito');
        }else{
            return redirect()->route('persona.index')->with('error','NO se pudo actualizar');
        }

        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Persona::find($id);

        try {
            if($persona->delete())  {
                return redirect()->route('persona.index')
        ->with('success','Usuario eliminado con éxito.');
            }else{
                return redirect()->route('persona.index')
        ->with('error','No se pudo eliminar el usuario.');
            }
        } catch (\Throwable $th) {
            
        return redirect()->route('persona.index')
        ->with('error','No se pudo completar la accion debido a una restricción en la base de datos.');
    }
    }
}
