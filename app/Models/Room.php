<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function Beds(){
        return $this->hasMany(Bed::class, 'room_id', 'id');
    }

}
