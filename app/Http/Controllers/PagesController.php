<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnLista(){
        return view('pagLista');
    }

    public function fnGaleria($numero=null){
        $valor = $numero;
        $otro  = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }

}
