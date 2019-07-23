<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\AdminService;

class ServicePoint extends Model
{
    protected $fillable = ['nama', 'alamat', 'telepon', 'zipcode'];


    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function service_point()
    {
    	return $this->hasOne(AdminService::class);
    }
}
