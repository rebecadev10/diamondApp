<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;

class PlanificacionController extends Controller
{
    //
    public function index(){
        // Obtener todas las publicaciones de la tabla Planificacion
        $publicaciones = Planificacion::all();

        // Pasar las publicaciones a la vista
        return view('planificacion.index', ['publicaciones' => $publicaciones]);
        // return view('planificacion.index');
    }
    public function publicar(){
        return view('planificacion.publicar');
    }
   
}
