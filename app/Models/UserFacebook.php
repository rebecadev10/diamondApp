<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFacebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'facebook_id','tokenFacebook',
    ];

    protected $appends = [
        'profile_photo_url',
    ];


}
