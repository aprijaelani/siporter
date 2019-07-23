<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\KartuPengobatan;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahapLanjutan extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];

    protected $fillable = ['tahap_lanjutan_bulan','kartu_pengobatan_id','tanggal_lanjutan_1_checklist','tanggal_lanjutan_1_strip','tanggal_lanjutan_2_checklist','tanggal_lanjutan_2_strip','tanggal_lanjutan_3_checklist','tanggal_lanjutan_3_strip','tanggal_lanjutan_4_checklist','tanggal_lanjutan_4_strip','tanggal_lanjutan_5_checklist','tanggal_lanjutan_5_strip','tanggal_lanjutan_6_checklist','tanggal_lanjutan_6_strip','tanggal_lanjutan_7_checklist','tanggal_lanjutan_7_strip','tanggal_lanjutan_8_checklist','tanggal_lanjutan_8_strip','tanggal_lanjutan_9_checklist','tanggal_lanjutan_9_strip','tanggal_lanjutan_10_checklist','tanggal_lanjutan_10_strip','tanggal_lanjutan_11_checklist','tanggal_lanjutan_11_strip','tanggal_lanjutan_12_checklist','tanggal_lanjutan_12_strip','tanggal_lanjutan_13_checklist','tanggal_lanjutan_13_strip','tanggal_lanjutan_14_checklist','tanggal_lanjutan_14_strip','tanggal_lanjutan_15_checklist','tanggal_lanjutan_15_strip','tanggal_lanjutan_16_checklist','tanggal_lanjutan_16_strip','tanggal_lanjutan_17_checklist','tanggal_lanjutan_17_strip','tanggal_lanjutan_18_checklist','tanggal_lanjutan_18_strip','tanggal_lanjutan_19_checklist','tanggal_lanjutan_19_strip','tanggal_lanjutan_20_checklist','tanggal_lanjutan_20_strip','tanggal_lanjutan_21_checklist','tanggal_lanjutan_21_strip','tanggal_lanjutan_22_checklist','tanggal_lanjutan_22_strip','tanggal_lanjutan_23_checklist','tanggal_lanjutan_23_strip','tanggal_lanjutan_24_checklist','tanggal_lanjutan_24_strip','tanggal_lanjutan_25_checklist','tanggal_lanjutan_25_strip','tanggal_lanjutan_26_checklist','tanggal_lanjutan_26_strip','tanggal_lanjutan_27_checklist','tanggal_lanjutan_27_strip','tanggal_lanjutan_28_checklist','tanggal_lanjutan_28_strip','tanggal_lanjutan_29_checklist','tanggal_lanjutan_29_strip','tanggal_lanjutan_30_checklist','tanggal_lanjutan_30_strip','tanggal_lanjutan_31_checklist','tanggal_lanjutan_31_strip','jumlah','berat_badan','created_at','updated_at','deleted_at'];
    
    public function kartu_pengobatan()
    {
    	return $this->belongsTo(KartuPengobatan::class);
    }
}
