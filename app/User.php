<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ServicePoint;
use App\NamaFaskes;
use App\AdminService;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telepon','faskes_id','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function isAdmin()
    {
        if($this->role && $this->role->admin == true){
            return true;
        }
        return false;
    }

    public function isSpl()
    {
        if($this->role && $this->role->spl == true){
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if($this->role && $this->role->user == true){
            return true;
        }
        return false;
    }

    public function servicePoint()
    {
        return $this->belongsTo(ServicePoint::class);
    }

    public function nama_faskes()
    {
        return $this->belongsTo(NamaFaskes::class,'faskes_id');
    }
}
