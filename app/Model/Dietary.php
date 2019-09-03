<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dietary extends Model
{
    protected $guarded = [];

    public function scopeGetDietary()
    {
        return Dietary::select(
            'id',
            'fld_name',
            'fld_icon_image'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }
}
