<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarTerduga;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Dokter;
use App\NamaFaskes;

class PermohonanLab extends Model
{
    use SoftDeletes;

	protected $table = 'register_laboratoriums';
	
	protected $dates = ['deleted_at'];

    protected $fillable = ['id','faskes_id','dokter_id','pasien_id','telepon','pengobatan_ke','tanggal_pengambilan_dahak_terakhir','tanggal_pengiriman_sediaan','alasan_pemeriksaan','pemeriksaan_ulang_pengobatan','pemeriksaan_ulang_pasca_pengobatan','no_Reg_tb_or_tb_MDR_Faskes','no_reg_tb_or_tb_mdr_kab_kota','jenis_terduga','jenis_dan_jumlah_pemeriksaan','klasifikasi_penyakit','lokasi','status_hiv','tipe_spesimen','nanah_lendir_1','nanah_lendir_2','nanah_lendir_3','bercak_darah_1','bercak_darah_2','bercak_darah_3','air_liur_1','air_liur_2','air_liur_3','tanggal','nama_jelas_dokter_pengirim','tanggal_hasil_sewaktu_1','tanggal_hasil_sewaktu_2','tanggal_hasil_sewaktu_3','sewaktu_satu','sewaktu_pagi','sewaktu_dua','no_reg_lab','created_at','updated_at','deleted_at'];

    public function daftar_terduga()
    {
    	return $this->belongsTo(DaftarTerduga::class,'pasien_id');
    }

    public function dokter()
    {
    	return $this->belongsTo(Dokter::class);
    }

    public function nama_faskes()
    {
        return $this->belongsTo(NamaFaskes::class,'faskes_id');
    }

    public function kartu_pengobatan()
    {
        return $this->hasMany('App\KartuPengobatan','permohonan_lab_id');
    }

}
