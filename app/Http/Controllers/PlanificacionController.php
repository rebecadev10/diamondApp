<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanificacionController extends Controller
{
    //
    public function index(){
        return view('planificacion.index');
    }
    public function publicar(){
        return view('planificacion.publicar');
    }
   
}
