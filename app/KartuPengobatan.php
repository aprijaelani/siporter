<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaftarTerduga;
use App\PermohonanLab;
use App\KontakSerumah;
use App\HasilPemeriksaanDahak;
use App\PeriksaUlang;
use App\JadwalPerjanjian;
use Illuminate\Database\Eloquent\SoftDeletes;

class KartuPengobatan extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['pasien_id','permohonan_lab_id','telepon','nama_pmo', 'telepon_pmo', 'alamat_pmo', 'tahun', 'no_reg_tb03_upk', 'nama_upk', 'no_reg_tb03_kab_kota', 'parut_bcg', 'klasifikasi_penyakit','dirujuk_oleh','riwayat_pengobatan_sebelumnya','lokasi','tipe_pasien','jenis_oat','tahap_intensif','catatan','empatkdt','duakdt','streptomisin','sthambutol','tanggal_dianjurkan','tanggal_pre_test','tempat_test','tanggal_test','tanggal_post_test','nama_upk2','no_reg_pra_art','tanggal_rujukan_pdp','tanggal_mulai_ppk','tanggal_mulai_art','hasil_akhir_pengobatan','tanggal_hasil','created_at','updated_at','deleted_at','tipe_diagnosis','status_hiv','uji_tuberkulin','nomor_seri','foto_toraks','biopsi_jarum_halus','kesan','hasil_selain_dahak','sumber_obat','hasil','riwayat_dm','hasil_tes_dm','terampil_dm','pindahan_nama_faskes','pindahan_kabupaten','pindahan_alamat','pindahan_provinsi','dirujuk_lainnya','sumber_obat_lain_lain','ppk','hrt'];

    public function daftar_terduga()
    {
    	return $this->belongsTo(DaftarTerduga::class,'pasien_id');
    }

    public function permohonan_lab()
    {
    	return $this->belongsTo(PermohonanLab::class,'permohonan_lab_id');
    }
    public function kontak_serumah()
    {
        return $this->hasMany(KontakSerumah::class,'kartu_pengobatan_id');
    }

    public function hasil_pemeriksaan_dahak()
    {
        return $this->hasMany(HasilPemeriksaanDahak::class);
    }

    public function jadwal_perjanjian()
    {
        return $this->hasMany(JadwalPerjanjian::class,'kartu_pengobatan_id');
    }

    public function periksa_ulang()
    {
        return $this->hasMany(PeriksaUlang::class,'kartu_pengobatan_id');
    }

    public function tahap_awal()
    {
        return $this->hasMany(TahapAwal::class,'kartu_pengobatan_id');
    }

    public function tahap_lanjutan()
    {
        return $this->hasMany(TahapLanjutan::class,'kartu_pengobatan_id');
    }
}
