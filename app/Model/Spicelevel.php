<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spicelevel extends Model
{
    protected $guarded = [];

    public function scopeGetSpicelevel()
    {
        return Spicelevel::select(
            'id',
            'fld_chili_icon',
            'fld_spice_level',
            'fld_name',
            'fld_icon_image'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }
}
