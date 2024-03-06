<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedResident extends Model
{
    use HasFactory;

    protected $table = "bed_residents";

    public function Resident(){
        return $this->hasOne(Resident::class, 'id', 'resident_id');
    }
}
