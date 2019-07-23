<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PermohonanLab;
use App\KartuPengobatan;
use App\JadwalPerjanjian;
use App\PeriksaUlang;
use App\Kecamatan;
use App\Kelurahan;

class DaftarTerduga extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['nik', 'nama_lengkap','bpjs', 'umur','wanita_usia_subur','tanggal_lahir','berat_badan','tinggi_badan', 'jenis_kelamin', 'alamat', 'rt', 'rw', 'kota', 'kecamatan_id', 'kelurahan_id','no_identitas_sediaan_dahak','tanggal_didaftar','dirujuk_oleh','lokasi_anatomi_penyakit','total_skoring_tb_anak','foto_toraks','status_hiv','riwayat_diabetes_melitus','tanggal_a','tanggal_b','tanggal_c','tanggal_mikroskopis','hasil_a','hasil_b','hasil_c','tanggal_expert','hasil_expert','tanggal_biakan','hasil_biakan','no_reg_lab','tanggal_mulai_pengobatan','dirujuk_ke','keterangan','status','created_at','updated_at','deleted_at'];

    public function permohonan_lab()
    {
    	return $this->hasMany(PermohonanLab::class,'pasien_id');
    }
    public function kartu_pengobatan()
    {
    	return $this->hasMany(KartuPengobatan::class,'pasien_id');
    }

    public function jadwal_perjanjian()
    {
        return $this->hasMany(JadwalPerjanjian::class,'pasien_id');
    }

    public function periksa_ulang()
    {
        return $this->hasMany(PeriksaUlang::class,'pasien_id');
    }

    public function nama_faskes()
    {
        return $this->belongsTo(NamaFaskes::class,'faskes_id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'kecamatan_id');   
    }

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'kelurahan_id');   
    }
}
