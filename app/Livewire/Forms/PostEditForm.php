<?php

namespace App\Livewire\Forms;

use App\Models\Planificacion;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostEditForm extends Form
{
    public $postId ='';
    public $open =false;
    #[Rule('required')]
    public $tipo_red_social;
    #[Rule('required')]
       public $descripcion;
       #[Rule('required')]
       public $date_public_facebook;
       #[Rule('required')]
       public $time_public_facebook;
       #[Rule('required')]
       public $date_public_instagram;
       #[Rule('required')]
       public $time_public_instagram; 
   public function edit($postId)
   {
    $this->open -true;
    $this->postId = $postId;
    $post = Planificacion::find($postId);

    $this->tipo_red_social->$post->tipo_red_social;
    $this->descripcion->$post->descricipcion;
    $this->date_public_facebook->$post->date_public_facebook;
    $this->time_public_facebook->$post->time_public_facebook;
    $this->date_public_instagram->$post->date_public_instagram;
    $this->time_public_instagram->$post->time_public_instagram;

   }

   public function update()
   {
    $this->validate();
    $post = Planificacion::find($this->postId);
    $post->update(
        $this->only('tipo_red_social','descricipcion','date_public_facebook','time_public_facebook','date_public_instagram','time_public_instagram')
    );
    $this->reset();
   }
}
