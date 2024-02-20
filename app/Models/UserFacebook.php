<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFacebook extends Model
{
    use HasFactory;
    protected $table = 'users_facebook';
    protected $fillable = [
        'name', 'email', 'facebook_id', 
    ];
    protected $hidden = [
        'tokenFacebook',
    ];
    protected $appends = [
        'profile_photo_url',
    ];


}
