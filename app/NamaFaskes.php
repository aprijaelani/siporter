<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RegisterLaboratorium;
use App\PermohonanLab;
use App\JadwalPerjanjian;
use App\PeriksaUlang;
use App\User;
use App\DaftarTerduga;

class NamaFaskes extends Model
{
    protected $table = 'faskes';


    public function permohonan_lab()
    {
    	return $this->hasMany(PermohonanLab::class,'faskes_id');
    }

    public function jadwal_perjanjian()
    {
    	return $this->hasMany(JadwalPerjanjian::class,'faskes_id');
    }

    public function periksa_ulang()
    {
    	return $this->hasMany(PeriksaUlang::class,'faskes_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'faskes_id');
    }

    public function daftar_terduga()
    {
        return $this->hasMany(DaftarTerduga::class, 'faskes_id');
    }}
