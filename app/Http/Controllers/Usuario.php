<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Usuario extends Controller
{
    
    public function index()
    {
        return view('login');  
    }



    
    public function store(Request $request)
    {
        //
        $request->validate([
            'usuario' => 'required',
            'clave' => 'required',
        ]);
        $users= DB::select('call proc_usuarios(?,?)',array($request->usuario,$request->clave));

        $empresa=null;
        $usuario=null;
        $nombre=null;
        $rol=null;
        $idpersona=null;
        $idmodulo=null;
        $comercial=null;

        if($users != null){

            foreach ($users as $user) {
                $idpersona= $user->PER_ID;
                $usuario= $user->PER_USUARIO;
                $nombre= $user->nombre;
                $rol= $user->PER_ROL;
                $empresa=$user->PER_EMPRESA;
                $idmodulo=$user->MOD_ID;
                $comercial=$user->EMP_COMERCIAL;
              }
            Session()->put('id',$idpersona);
            Session()->put('nombre',$nombre);
            Session()->put('rol',$rol);
            Session()->put('empresa',$empresa);
            Session()->put('modulo',$idmodulo);
            Session()->put('comercial',$comercial);

            return view('welcome', ['usuario' => $users]);
        }else{
            return redirect()->route('login.index')
            ->with('error','Usuario no registrado');
        }

       
        

       
    }

    
}
