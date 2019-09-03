<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    public function scopeGetAllergy()
    {
        return Allergy::select('id', 'fld_name', 'fld_description')
            ->where('fld_status', 'a')
            ->orderBy('id', 'desc')->get();
    }
}
