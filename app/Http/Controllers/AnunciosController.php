<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnunciosController extends Controller
{
    public function index(){
        return view('anuncios.index');
    }
}
