<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnaliticaController extends Controller
{
    public function index(){
        return view('analitica.index');
    }
}
