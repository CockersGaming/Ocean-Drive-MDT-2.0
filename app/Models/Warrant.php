<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

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

    public function character() {
        return Character::findOrFail($this->ped_id);
    }
    public function author() {
        return Character::findOrFail($this->author_id);
    }
    public function expire() {
        if ($this->expire >= Date::now()){
            return "Valid";
        } else {
            return "Expired";
        }
    }
}
