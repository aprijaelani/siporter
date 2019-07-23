<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarTerduga;

class Kecamatan extends Model
{
    public function daftar_terduga(){
        return $this->hasMany(DaftarTerduga::class);   
    }
}
