<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\KartuPengobatan;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontakSerumah extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['kartu_pengobatan_id','nama_lengkap','jenis_kelamin','umur','tanggal_periksa','hasil','tindak_lanjut'];

    public function permohonan_lab()
    {
    	return $this->hasMany(PermohonanLab::class);
    }

    public function kartu_pengobatan()
    {
    	return $this->hasMany(KartuPengobatan::class);
    }
}
