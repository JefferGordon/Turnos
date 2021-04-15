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
            'txtuser' => 'required',
            'txtpass' => 'required',
        ]);
        $users= DB::select('call proc_usuarios(?,?)',array($request->txtuser,$request->txtpass));

        $usuario = $_POST['txtuser'];
        $pass = $_POST['txtpass'];
        $login=null;
        $clave=null;
        $nombre=null;
        $rol=null;
        $idper=null;
        foreach ($users as $user) {
          $login= $user->USU_LOGIN;
          $clave= $user->USU_PASSWORD;
          $nombre= $user->PER_NOMBRES;
          $rol= $user->USU_ROL;
          $idper=$user->PER_ID;
        }
        if($usuario=$login && $pass=$clave)

        {

            Session()->put('id',$idper);
            Session()->put('nombre',$nombre);
            Session()->put('rol',$rol);
           
            
            return view('menu.index', ['usuario' => $users]);
        }
        else {
         
            return redirect()->route('login.index')
            ->with('success','Usuario no registrado');
        }


       
    }

    
}
