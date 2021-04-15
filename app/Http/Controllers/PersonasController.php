<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\Valcreatepersona;
use App\Http\Requests\Valupdatepersona;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persona = DB::select('call proce_listapersonas');
     

        return view('personas.index', ['persona' => $persona]);
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
    public function store(Valcreatepersona $request)
    {
        //


        DB::table('tbl_personas')->insert(
            ['PER_NOMBRES' => $request->txtnombres,
            'PER_APELLIDOS' => $request->txtapellidos,
            'PER_CEDULA' => $request->txtcedula,
            'PER_EMAIL' => $request->txtcorreo,
            'GEN_ID' => $request->cbxgenero,
            'MOD_ID' => $request->cbxmodulo,

            'PER_ADD'=> $request->txtfecha,
            'PER_ESTADO'=>$request->txtestado
           
            ]
        );

        return redirect()->route('persona.index')->with('success','Persona guardada con éxito');
   
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
    public function edit(Persona $persona)
    {
        return view('personas.edit',compact('persona'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdatepersona $request, Persona $persona)
    {
        $id=$request->txtid;
     
            
        DB::table('tbl_personas') ->where('PER_ID', $id) ->update(['GEN_ID' =>$request->cbxgenero,'MOD_ID' =>$request->cbxmodulo,'PER_NOMBRES' =>$request->txtnom,'PER_APELLIDOS' =>$request->txtape,'PER_CEDULA' =>$request->txtced,'PER_EMAIL' =>$request->txtmail,'PER_ESTADO' =>$request->cbxestado]);
    
        return redirect()->route('persona.index')->with('success','Persona actualizada con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        $persona->delete();
        return redirect()->route('persona.index')
        ->with('delete','Persona eliminado con éxito.');
    }
}
