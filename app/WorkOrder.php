<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['user_id', 'admin_service_id', 'supply_thermal', 'mobile_operator','type_komunikasi','nomor_direct_line','respon_time_debit','respon_time_kredit','respon_time_prepaid','respon_time_loyalty','kelengkapan_edc','kelengkapan_dongle','description','jam_mulai','jam_selesai','tanggal','photo_toko','photo_struk','nama_pic','no_telepon'];
    
}
