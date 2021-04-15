<?php

namespace App\Http\Controllers;

use App\Periodomatricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Valcreateperiodomatricula;
use App\Http\Requests\Valupdateperiodomatricula;
class PeriodosmatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      //
      $perma = DB::select('call proce_listaperma');

      return view('periodosmatriculas.index', ['perma' => $perma]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodosmatriculas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreateperiodomatricula $request)
    {
        
        DB::table('tbl_periodos_matriculas')->insert(
            ['PERI_ID' => $request->cbxperiodo,
            'MAT_ID' => $request->cbxmatricula,
           
            'PMAR_FECHAINI' => $request->txtfechini,
            'PMAR_FECHAFIN' => $request->txtfechfin

            ]
        );

        return redirect()->route('periodomatricula.index')->with('success','Asignación guardada con éxito');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Periodomatricula  $periodomatricula
     * @return \Illuminate\Http\Response
     */
    public function show(Periodomatricula $periodomatricula)
    {
        //
        $permat = DB::select('call proc_periodos_matriculasId(?)',array($periodomatricula->PMAR_ID));

        return view('periodosmatriculas.show', ['permat' => $permat]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodomatricula  $periodomatricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodomatricula $periodomatricula)
    {
        return view('periodosmatriculas.edit',compact('periodomatricula'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodomatricula  $periodomatricula
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdateperiodomatricula $request, Periodomatricula $periodomatricula)
    {
        $id=$request->txtid;
     
    DB::table('tbl_periodos_matriculas') ->where('PMAR_ID', $id) ->update(['PMAR_FECHAINI' =>$request->txtfechini,'PMAR_FECHAFIN' =>$request->txtfechfin,'PMAR_ESTADO' =>$request->cbxestado]);

    return redirect()->route('periodomatricula.index')->with('success','Período-Matrículas actualizado con éxito');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodomatricula  $periodomatricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodomatricula $periodomatricula)
    {


        try {
            $periodomatricula->delete();
        return redirect()->route('periodomatricula.index')
        ->with('delete','Asignación eliminada con éxito.');
        } 
        catch (\Throwable $th) {
            return redirect()->route('periodomatricula.index')
        ->with('delete','No se puede eliminar debido a que este registro se encuentra en uso.');
        }
        
        

        
    }
}
