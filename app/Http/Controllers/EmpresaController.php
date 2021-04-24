<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;

class EmpresaController extends Controller
{

    public function index()
    {
        //
        //$sql="SELECT * FROM tbl_empresa where EMP_ESTADO='A'";
        //$datosEmpresa = DB::select($sql);
        $datosEmpresa = Empresa::all();
        return view('empresa.create', ['empresa' => $datosEmpresa]);


    }
   
    public function update(Request $request,$id)
    {

        $empresa = Empresa::find($id);
        $empresa->EMP_RAZONSOCIAL=$request->post('rsocial');
        $empresa->EMP_COMERCIAL=$request->post('comercial');
        $empresa->EMP_RUC=$request->post('ruc');
        $empresa->EMP_DIRECCION=$request->post('direccion');
        $empresa->EMP_TELEFONO1=$request->post('tel1');
        $empresa->EMP_TELEFONO2=$request->post('tel2');
        $empresa->EMP_CORREO=$request->post('correo');
        $empresa->EMP_REPRESENTANTE=$request->post('representante');

        if($empresa->save())
        {
            return redirect()->route('empresa.index')->with('success','Datos guardados con éxito');
        }else{
            return redirect()->route('empresa.index')->with('error','Ocurrio un error al interntar guardar los datos');
        }
       
       
    }


}