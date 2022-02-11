<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $fillable = [
        'ped_id',
        'title',
        'description',
        'charges',
        'author_id',
        'jail_time',
        'charge_amount',
    ];

    protected $casts = [
        'charges' => 'array'
    ];

    public function character() {
        return Character::findOrFail($this->ped_id);
    }
    public function author() {
        return Character::findOrFail($this->author_id);
    }
}
