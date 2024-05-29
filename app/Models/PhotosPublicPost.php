<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Planificacion;
class PhotosPublicPost extends Model
{
    use HasFactory;
    protected $fillable = ['image_path'];

    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class);
    }
}
