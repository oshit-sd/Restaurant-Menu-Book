<?php

namespace App\Model\Condiment;

use Illuminate\Database\Eloquent\Model;

class CondimentsGroup extends Model
{
    protected $guarded = [];

    public function scopeGetCondimentsGroup()
    {
        return CondimentsGroup::select('id', 'fld_name')
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }

    public static function getGroupName($id = null)
    {
        $name = CondimentsGroup::select('fld_name')->where('id', $id)->first();
        if ($name) {
            return $name->fld_name;
        } else {
            return "";
        }
    }

    public function condiments()
    {
        return $this->belongsToMany(Condiments::class)->where('fld_status', 'a');
    }
}
