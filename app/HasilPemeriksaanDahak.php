<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HasilPemeriksaanDahak extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['kartu_pengobatan_id', 'bulan','tanggal', 'no_reg_lab', 'bta', 'bb','created_at','updated_at','deleted_at'];

    public function kartu_pengobatan()
    {
        return $this->belongsTo('App\KartuPengobatan','faskes_id');
    }
}
