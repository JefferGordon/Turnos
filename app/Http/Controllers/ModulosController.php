<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\Valcreatemodulo;
use App\Http\Requests\Valupdatemodulo;
class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mod= DB::select('call proc_listamodulos');

        return view('modulos.index', ['modulo' => $mod]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreatemodulo $request)
    {
        //
        DB::table('tbl_modulos')->insert(
            ['MOD_NUMERO' => $request->txtnum,
            'MOD_DESCRIPCION'=> $request->txtdesc,
            'MOD_ADD'=>$request->txtfecha,
            'MOD_ESTADO'=>$request->txtestado
           

            ]
        );

        return redirect()->route('modulo.index')->with('success','Módulo guardado con éxito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        $modulo = DB::select('call proc_moduloid(?)',array($modulo->MOD_ID));

        return view('modulos.show', ['modulo' => $modulo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        return view('modulos.edit',compact('modulo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdatemodulo $request, Modulo $modulo)
    {
           
     $id=$request->txtid;
     
     DB::table('tbl_modulos') ->where('MOD_ID', $id) ->update(['MOD_NUMERO' =>$request->txtnum,'MOD_DESCRIPCION' =>$request->txtdes,'MOD_ESTADO' =>$request->cbxestado]);
 
     return redirect()->route('modulo.index')->with('success','Módulo actualizado con éxito');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        //

        try {
            if($modulo->delete())  {
                return redirect()->route('modulo.index')
        ->with('delete','módulo eliminado con éxito.');
            }else{
                return redirect()->route('modulo.index')
        ->with('delete','No se pudo eliminar el modulo.');
            }
        } catch (\Throwable $th) {
            
        return redirect()->route('modulo.index')
        ->with('delete','No se pudo completar la accion.');
    }
    }
}
