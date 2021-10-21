<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesoController extends Controller
{
    //
    public function validar(Request $r){
        $usuario=$r->get('usuario');
        $contraseña=$r->get('password');
        return "Mi usuario es : $usuario y mi contraseñan es: $contraseña";
    }
}
