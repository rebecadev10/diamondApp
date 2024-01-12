<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use Livewire\Component;
use App\Models\Planificacion;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;
    
    public function render()
    {
        return view('livewire.create-post');
    }
    public function save()
    {

        $this->postCreate->save();
    }
    public function edit($postId)
    {
        $this->resetValidation();
        $this->postEdit->edit($postId);
    }
    public function update()
    {
        $this->postEdit->update();
    }
    public function destroy($postId)
    {
        $post = Planificacion::find($postId);
        $post->delete();

    }
  
}
