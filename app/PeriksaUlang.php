<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarTerduga;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Dokter;
use App\NamaFaskes;
use App\KartuPengobatan;

class PeriksaUlang extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];

    protected $fillable = ['id','kartu_pengobatan_id','tanggal_janji','bulan_ke','status_janji','created_at','updated_at','deleted_at'];

    public function daftar_terduga()
    {
    	return $this->belongsTo('App\DaftarTerduga', 'pasien_id');
    }

    public function nama_faskes()
    {
        return $this->belongsTo(NamaFaskes::class,'faskes_id');
    }

    public function kartu_pengobatan()
    {
        return $this->belongsTo(KartuPengobatan::class);
    }
}
