<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard = 'admin';


    protected $fillable = [
        'name', 'username', 'password', 'admin_type', 'team_id', 'status', 'add_by',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeGet_admin_list()
    {
        return Admin::where('status', 'a')->orderBy('id', 'desc')->get();
    }


    public function TeamName()
    {
        return $this->hasOne('App\TeamName', 'id', 'team_id');
    }

}
