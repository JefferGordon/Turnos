<?php

namespace App\Http\Controllers;

use App\Matricula;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Valcreatematricula;
use App\Http\Requests\Valupdatematricula;
class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mat= DB::select('call proce_listamatriculas');

        return view('matriculas.index', ['mat' => $mat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matriculas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreatematricula $request)
    {
        DB::table('tbl_matriculas')->insert(
            ['MAT_DESCRIPCION' => $request->txtdes,
            'MAT_LETRA' => $request->txtpref
            
            ]
        );

        return redirect()->route('matricula.index')->with('success','Matrícula guardada con éxito');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
        $mat = DB::select('call proce_listamatriculasId(?)',array($matricula->MAT_ID));

        return view('matriculas.show', ['matricula' => $mat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit',compact('matricula'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdatematricula $request, Matricula $matricula)
    {
        $id=$request->txtid;
     
        DB::table('tbl_matriculas') ->where('MAT_ID', $id) ->update(['MAT_DESCRIPCION' =>$request->txtdes,'MAT_LETRA' =>$request->txtletra,'MAT_ESTADO' =>$request->cbxestado]);
    
        return redirect()->route('matricula.index')->with('success','Matrícula actualizada con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matricula.index')
        ->with('delete','Matrícula eliminada con éxito.');

        
    }
}
