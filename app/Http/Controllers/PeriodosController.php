<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Valcreateperiodo;
use App\Http\Requests\Valupdateperiodo;
class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $per = DB::select('call proce_listarperiodos');

        return view('periodos.index', ['per' => $per]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreateperiodo $request)
    {
        DB::table('tbl_periodos')->insert(
            ['PERI_DESCRIPCION' => $request->txtper

            ]
        );

        return redirect()->route('periodo.index')->with('success','Período guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
        $peri = DB::select('call  proce_PeriodosId(?)',array($periodo->PERI_ID));

        return view('periodos.show', ['periodo' => $peri]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        return view('periodos.edit',compact('periodo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdateperiodo $request, Periodo $periodo)
    {
        
        $id=$request->txtid;
     
        DB::table('tbl_periodos') ->where('PERI_ID', $id) ->update(['PERI_DESCRIPCION' =>$request->txtdes,'PERI_ESTADO' =>$request->cbxestado]);
    
        return redirect()->route('periodo.index')->with('success','Período actualizado con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodo $periodo)
    {
try {
    $periodo->delete();
    return redirect()->route('periodo.index')
    ->with('delete','Período eliminado con éxito.');
} catch (\Throwable $th) {
    return redirect()->route('periodo.index')->with('delete','No se puede eliminar debido a que este registro se encuentra en uso.');
}

       

        
    }
}
