<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Planificacion;

class CreatePost extends Component
{
    public $tipo_red_social='', $descricipcion,$date_public_facebook,$time_public_facebook,$date_public_instagram,$time_public_instagram;
    public function render()
    {
        return view('livewire.create-post');
    }
    public function save()
    {
        Planificacion::create([
            'tipo_red_social' => $this->tipo_red_social,
            'descricipcion' => $this->descricipcion,
            'date_public_facebook' => $this->date_public_facebook,
            'time_public_facebook' => $this->time_public_facebook,
            'date_public_instagram' => $this->date_public_instagram,
            'time_public_instagram' => $this->time_public_facebook,
            

        ]);
    }
}
