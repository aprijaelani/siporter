<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
use App\Merchant;
use App\ServicePoint;
use App\User;
use App\WorkOrder;

class AdminService extends Model
{
    protected $fillable = ['user_id', 'merchant_id', 'id_work_order','service_point_id','nomor_laporan', 'description','status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function merchant()
    {
    	return $this->belongsTo(Merchant::class);
    }

    public function service_point()
    {
    	return $this->belongsTo(ServicePoint::class);
    }

    public function work_order()
    {
        return $this->belongsTo(WorkOrder::class);
    }


}
