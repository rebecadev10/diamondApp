<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PhotosPublicPost;

class Planificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_red_social', 
        'descripcion',
        'date_public_facebook',
        'date_public_instagram',
        'time_public_facebook',
        'time_public_instagram'
    ];
    public function photosPublicPost()
    {
        return $this->hasMany(PhotosPublicPost::class);
    }
}
