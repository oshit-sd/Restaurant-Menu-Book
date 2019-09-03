<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function scopeGetService()
    {
        return Service::select('id', 'fld_name')
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }
}
