<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Request\Login;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Valcreateusuario;
use App\Http\Requests\Valupdateusuario;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $users = DB::select('call proc_listausuarios');



        return view('usuarios.index', ['usuario' => $users]);
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');

    }

  

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Valcreateusuario $request)
    {
        //
        DB::table('tbl_usuarios')->insert(
            ['USU_LOGIN' => $request->txtusuario,
            'USU_PASSWORD'=>$request->txtclave,
            'USU_ROL'=>$request->cbxrol,
            'PER_ID'=> $request->cbxpersona
            
           

            ]
        );

        return redirect()->route('usuario.index')->with('success','Usuario guardado con éxito');
   

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
        $users = DB::select('call proc_usuarioid(?)',array($usuario->USU_ID));

        return view('usuarios.show', ['usuario' => $users]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Valupdateusuario $request, Usuario $usuario)
    {
        $id=$request->txtusuid;

        DB::table('tbl_usuarios') ->where('USU_ID', $id) ->update(['USU_LOGIN' =>$request->txtlogin, 'USU_PASSWORD' =>$request->txtpassword, 'USU_ESTADO' =>$request->cbxestado
        ,'USU_ROL'=>$request->cbxrol]);

    return redirect()->route('usuario.index')->with('success','Usuario  actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index')
        ->with('delete','Usuario eliminado con éxito.');

    }
}
