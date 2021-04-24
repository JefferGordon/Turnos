<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::where("SER_ESTADO","=","A")->paginate(5);
        return view('servicio.index', ['servicio' => $servicios]);
    }
    public function inactivo()
    {
        $servicios = Servicio::where("SER_ESTADO","=","I")->paginate(5);
        return view('servicio.indexInactivo', ['servicio' => $servicios]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $SECUENCIAL=1;
        $request->validate([
            'identificador' => 'required|unique:tbl_servicio,ser_identificador|max:5',
            'servicio'=> 'required|unique:tbl_servicio,ser_descripcion',
            'horainicia'=>'required',
            'horafin'=>'required'
        ]);
        $servicio = new Servicio([

            'SER_DESCRIPCION'=> $request->post('servicio'),
            'SER_IDENTIFICADOR'=> $request->post('identificador'),
            'SER_SECUENCIAL'=> $SECUENCIAL,
            'SER_HORAA'=> $request->post('horainicia'),
            'SER_HORAF'=> $request->post('horafin')
        ]);
        if($servicio->save()){
            return redirect()->route('servicio.index')->with('success','Datos guardados con éxito');
        }else{
            return redirect()->route('servicio.index')->with('error','Los datos no se guardaron');
        }
        
    }

    
    public function show( )
    {
       
    }

    
    public function edit(Servicio $servicio)
    {

        return view('servicio.detalle',compact('servicio'));
    }

    public function update(Request $request,$id)
    {
        if($request->post('estado') == "A"){
            $estado='A';
        }else{
            $estado='I';
        }
        $request->validate([
            'identificador' => 'required|unique:tbl_servicio,ser_identificador,'.$id. ',SER_ID|max:5',
            'servicio'=> 'required|unique:tbl_servicio,ser_descripcion,'.$id.',SER_ID',
            'horainicia'=>'required',
            'horafin'=>'required'
        ]);
        $servicio = Servicio::find($id);
        $servicio->SER_DESCRIPCION=$request->post('servicio');
        $servicio->SER_IDENTIFICADOR=$request->post('identificador');
        $servicio->SER_HORAA=$request->post('horainicia');
        $servicio->SER_HORAF=$request->post('horafin');
        $servicio->SER_ESTADO=$estado;
        
        if($servicio->save())
        {
            return redirect()->route('servicio.index')->with('success','Servicio actualizado con éxito');
        }else
        {
            return redirect()->route('servicio.index')->with('error','No se modificaron los datos');
        }



    }
     
    
    public function destroy($id)
    {
       
        $servicio = Servicio::find($id);


        try {
            if($servicio->delete())  {
                return redirect()->route('servicio.index')
        ->with('success','servicio eliminado con éxito.');
            }else{
                return redirect()->route('servicio.index')
        ->with('error','No se pudo eliminar el servicio.');
            }
        } catch (\Throwable $th) {
            
        return redirect()->route('servicio.index')
        ->with('error','No se pudo completar la accion debido a una restricción en la base de datos.');
    }
     }
    
}
    

