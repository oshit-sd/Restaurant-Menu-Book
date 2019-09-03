<?php

namespace App\Model\Condiment;

use Illuminate\Database\Eloquent\Model;

class Condiments extends Model
{
    protected $guarded = [];

    public function scopeGetCondiments()
    {
        return Condiments::select(
            'id',
            'fld_condiment_name',
            'fld_price'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }

    /*
     * get condiment name=====
     */
    public static function getName($id = null)
    {
        $name = Condiments::select('fld_condiment_name')->where('id', $id)->first();
        if ($name) {
            return $name->fld_condiment_name;
        } else {
            return "";
        }
    }

    /*
     * get condiment price=====
     */
    public static function getPrice($id = null)
    {
        $price = Condiments::select('fld_price')->where('id', $id)->first();
        if ($price) {
            return $price->fld_price;
        } else {
            return "";
        }
    }
}
