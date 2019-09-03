<?php

namespace App\Model\Ingredient;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    public function scopeGetIngredient()
    {
        return Ingredient::select(
            'id',
            'fld_name',
            'fld_price'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }


    /*
     * get ingredient name=====
     */
    public static function getName($id = null)
    {
        $name = Ingredient::select('fld_name')->where('id', $id)->first();
        if ($name) {
            return $name->fld_name;
        } else {
            return "";
        }
    }

    /*
     * get ingredient price=====
     */
    public static function getPrice($id = null)
    {
        $price = Ingredient::select('fld_price')->where('id', $id)->first();
        if ($price) {
            return $price->fld_price;
        } else {
            return "";
        }
    }
}
