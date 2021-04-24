<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\Rule;

class ModulosController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $mod= DB::select('call proc_listamodulos');
        $modulo= Modulo::where("MOD_ESTADO","=","A")->paginate(5);
        return view('modulos.index', ['modulo' => $modulo]);
    }
    public function inactivo()
    {
        //
       // $mod= DB::select('call proc_listamodulos');
        $modulo= Modulo::where("MOD_ESTADO","=","I")->paginate(5);
        return view('modulos.indexInactivo', ['modulo' => $modulo]);
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
    public function store(Request $request)
    {
        $request->validate([
            'identificador' => 'required|unique:tbl_modulos,mod_numero',
            'descripcion'=> 'required'
        ]);
        $modulo = new Modulo([

            'MOD_DESCRIPCION'=> $request->post('descripcion'),
            'MOD_NUMERO'=> $request->post('identificador'),
            'MOD_EMPRESA'=> $request->post('idempresa')
        ]);
        if($modulo->save()){
            return redirect()->route('modulo.index')->with('success','Datos guardados con éxito');
        }else{
            return redirect()->route('modulo.index')->with('error','Los datos no se guardaron');
        }

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
        return view('modulos.detalle',compact('modulo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
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
            'identificador' => 'required|unique:tbl_modulos,MOD_NUMERO,'.$id.',MOD_ID',
            'descripcion'=> 'required'
        ]);
        $modulo = Modulo::find($id);
        $modulo->MOD_NUMERO=$request->post('identificador');
        $modulo->MOD_DESCRIPCION=$request->post('descripcion');
        $modulo->MOD_ESTADO=$estado;
        if($modulo->save())
        {
            return redirect()->route('modulo.index')->with('success','Módulo actualizado con éxito');
        }else
        {
            return redirect()->route('modulo.index')->with('error','No se modificaron los datos');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        $modulo = Modulo::find($id);


        try {
            if($modulo->delete())  {
                return redirect()->route('modulo.index')
        ->with('success','módulo eliminado con éxito.');
            }else{
                return redirect()->route('modulo.index')
        ->with('error','No se pudo eliminar el modulo.');
            }
        } catch (\Throwable $th) {
            
        return redirect()->route('modulo.index')
        ->with('error','No se pudo completar la accion.');
    }
    }
}
