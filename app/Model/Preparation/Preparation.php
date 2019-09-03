<?php

namespace App\Model\Preparation;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $guarded = [];

    public function scopeGetPreparation()
    {
        return Preparation::select(
            'id',
            'fld_name',
            'fld_price',
            'fld_position'
        )
            ->where('fld_status', 'a')->orderBy('fld_position', 'asc')->get();
    }

    /*
     * get preparation name=====
     */
    public static function getName($id = null)
    {
        $name = Preparation::select('fld_name')->where('id', $id)->first();
        if ($name) {
            return $name->fld_name;
        } else {
            return "";
        }
    }


    /*
     * get preparation price=====
     */
    public static function getPrice($id = null)
    {
        $price = Preparation::select('fld_price')->where('id', $id)->first();
        if ($price) {
            return $price->fld_price;
        } else {
            return "";
        }
    }
}
