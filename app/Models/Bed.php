<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    public function Resident()
    {
        return $this->hasOne(BedResident::class, 'bed_id', 'id')->where('status', 1)->latest();
    }

    public function oldResident()
    {
        return $this->hasOne(BedResident::class, 'bed_id', 'id');
    }
    public function Residents(){
        return $this->hasMany(BedResident::class, 'bed_id', 'id');
    }


}
