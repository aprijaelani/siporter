<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdminService;

class Merchant extends Model
{
    public function admin_services ()
    {
    	return $this->hasMany(AdminService::class);
    }
}
