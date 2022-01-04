<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $connection = 'ocean_drive';
    protected $table = 'players';

    public function fullname() {
        return $this->firstname." ".$this->lastname;
    }
}
