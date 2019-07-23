<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\KartuPengobatan;

class TahapAwal extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];

    protected $fillable = ['tahap_awal_bulan','kartu_pengobatan_id','tanggal_1_checklist','tanggal_1_strip','tanggal_2_checklist','tanggal_2_strip','tanggal_3_checklist','tanggal_3_strip','tanggal_4_checklist','tanggal_4_strip','tanggal_5_checklist','tanggal_5_strip','tanggal_6_checklist','tanggal_6_strip','tanggal_7_checklist','tanggal_7_strip','tanggal_8_checklist','tanggal_8_strip','tanggal_9_checklist','tanggal_9_strip','tanggal_10_checklist','tanggal_10_strip','tanggal_11_checklist','tanggal_11_strip','tanggal_12_checklist','tanggal_12_strip','tanggal_13_checklist','tanggal_13_strip','tanggal_14_checklist','tanggal_14_strip','tanggal_15_checklist','tanggal_15_strip','tanggal_16_checklist','tanggal_16_strip','tanggal_17_checklist','tanggal_17_strip','tanggal_18_checklist','tanggal_18_strip','tanggal_19_checklist','tanggal_19_strip','tanggal_20_checklist','tanggal_20_strip','tanggal_21_checklist','tanggal_21_strip','tanggal_22_checklist','tanggal_22_strip','tanggal_23_checklist','tanggal_23_strip','tanggal_24_checklist','tanggal_24_strip','tanggal_25_checklist','tanggal_25_strip','tanggal_26_checklist','tanggal_26_strip','tanggal_27_checklist','tanggal_27_strip','tanggal_28_checklist','tanggal_28_strip','tanggal_29_checklist','tanggal_29_strip','tanggal_30_checklist','tanggal_30_strip','tanggal_31_checklist','tanggal_31_strip','jumlah','berat_badan','created_at','updated_at','deleted_at'];
    
    public function permohonan_lab()
    {
    	return $this->belongsTo(KartuPengobatan::class);
    }
}
