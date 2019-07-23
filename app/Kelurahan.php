<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarTerduga;

class Kelurahan extends Model
{
    public function daftar_terduga(){
        return $this->hasMany(DaftarTerduga::class);   
    }
}
