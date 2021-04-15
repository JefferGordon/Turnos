<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Valcreategenero;
use App\Http\Requests\Valupdategenero;
class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gen = DB::select('call proc_listageneros');

        return view('generos.index', ['genero' => $gen]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('generos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreategenero $request)
    {
        //
        DB::table('tbl_generos')->insert(
            ['GEN_DESCRIPCION' => $request->txtgenero, 
            'GEN_ADD'=> $request->txfecha
           
            ]
        );

        return redirect()->route('genero.index')->with('success','Género guardado con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        $genero = DB::select('call proc_generoid(?)',array($genero->GEN_ID));

        return view('generos.show', ['genero' => $genero]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {


        return view('generos.edit',compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdategenero $request, Genero $genero)
    {
        
     $id=$request->txtid;
     
    DB::table('tbl_generos') ->where('GEN_ID', $id) ->update(['GEN_DESCRIPCION' =>$request->txtdes]);

    return redirect()->route('genero.index')->with('success','Género  actualizado con éxito');

}
           
           
      


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        //
        $genero->delete();
        return redirect()->route('genero.index')
        ->with('delete','género eliminado con éxito.');

    }
}
