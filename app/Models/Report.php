<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public function character() {
        return Character::where($this->ped_id, 'id');
    }
}
