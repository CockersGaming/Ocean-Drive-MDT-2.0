<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'email',
        'firstname',
        'lastname',
        'department',
        'role',
        'token',
    ];
}
