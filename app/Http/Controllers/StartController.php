<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function start(){
        return view('layout');
    }

    public function kontakt(){
        return view('ogolny.kontakt');
    }
    public function onas(){
        $zadania = [
            'Zadanie 1',
            'Zadanie 2',
            'Zadanie 3'
        ];
        return view('ogolny.onas')->with('zadania',$zadania);
    }
}
