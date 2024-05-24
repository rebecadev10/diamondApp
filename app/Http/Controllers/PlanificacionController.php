<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planificacion;

class PlanificacionController extends Controller
{
    //
    public function index(){
        // Obtener todas las publicaciones de la tabla Planificacion
        // $publicaciones = Planificacion::all();
        $publications = Planificacion::select('descripcion', 'date_public_facebook', 'date_public_instagram')->get();

        $events = [];

        foreach ($publications as $publication) {
            if ($publication->date_public_facebook) {
                $events[] = [
                    'title' => 'Facebook: ' . $publication->descripcion,
                    'start' => $publication->date_public_facebook,
                    'color' => '#3b5998'
                ];
            }

            if ($publication->date_public_instagram) {
                $events[] = [
                    'title' => 'Instagram: ' . $publication->descripcion,
                    'start' => $publication->date_public_instagram,
                    'color' => '#e4405f'
                ];
            }
        }

        $data= response()->json($events);

        // Pasar las publicaciones a la vista
        return view('planificacion.index', ['publicaciones' => $data]);
        // return view('planificacion.index');
    }
    public function publicar(){
        return view('planificacion.publicar');
    }
    
   
}
