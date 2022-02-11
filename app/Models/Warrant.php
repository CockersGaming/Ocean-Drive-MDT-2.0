<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plate',
        'ped_id',
        'report_id',
        'expire',
        'notes',
        'author_id',
    ];

    protected $casts = [
        'report_id' => 'array'
    ];
}
