<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PermohonanLab;

class Dokter extends Model
{
    public function permohonan_lab()
    {
    	return $this->hasMany(PermohonanLab::class);
    }
}
