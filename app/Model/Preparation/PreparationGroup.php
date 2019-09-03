<?php

namespace App\Model\Preparation;

use Illuminate\Database\Eloquent\Model;
use Session;

class PreparationGroup extends Model
{
    protected $guarded = [];

    public function scopeGetPreparationGroup()
    {
        return PreparationGroup::select(
            'id',
            'fld_name'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }


    public static function getGroupName($id = null)
    {
        $name = PreparationGroup::select('fld_name')->where('id', $id)->first();
        if ($name) {
            return $name->fld_name;
        } else {
            return "";
        }
    }



    public static function mergePreparation($itemId = null, $preparationArr = null, $preParation = null)
    {
        $qty = 0;
        // dd($preparationArr);
        // dd(Session::get('cartQty'));

        // remove enhancement qty======
        if (!empty(Session::get('cartQty'))) {
            foreach (Session::get('cartQty') as $key1 => $removeQty) {
                foreach ($removeQty as $singleQty) {
                    if ($key1 == $itemId) {
                        foreach ($preparationArr as $key2 => $preparationGroup) {
                            if ($key2 == $singleQty) {
                                unset($preparationArr[$singleQty]);
                            }
                        }
                    }
                }
            }
        }

        //common preparation count qty========
        foreach ($preparationArr as $key => $preparationGroup) {
            if ($preParation == $preparationGroup) {
                $qty++;
            }
        }

        if ($qty == 0)
            return $qty = 1;
        return $qty;
    }


    public function preparation()
    {
        return $this->belongsToMany(Preparation::class)
            ->orderBy('fld_position', 'asc')->where('fld_status', 'a');
    }
}
