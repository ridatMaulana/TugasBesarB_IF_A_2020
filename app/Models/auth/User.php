<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // use HasFactory;
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
