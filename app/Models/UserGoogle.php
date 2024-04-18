<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGoogle extends Model
{
    use HasFactory;
    protected $table = 'user_google';
    protected $fillable = [
        'name', 'email', 'google_id','google_token','google_refresh_token'
    ];
    
    protected $appends = [
        'google_profile_photo_url',
    ];

}
