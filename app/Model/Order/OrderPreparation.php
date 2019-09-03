<?php

namespace App\Model\Order;

use App\Model\Preparation\Preparation;
use Illuminate\Database\Eloquent\Model;

class OrderPreparation extends Model
{
    protected $guarded = [];

    /*
     * Store information=====
     */
    protected static function store($preparation, $orderDetailsID)
    {
        foreach ($preparation as $preID) :
            $price = Preparation::getPrice($preID[2]);
            $arr = [
                'qty'                   => $preID[0],
                'price'                 => $price,
                'order_details_id'      => $orderDetailsID,
                'preparation_group_id'  => $preID[1],
                'preparation_id'        => $preID[2]
            ];
            $res = OrderPreparation::insert($arr);
        endforeach;

        if ($res) :
            return true;
        else :
            return false;
        endif;
    }


    /*
     * unique Preparation
     */
    public static function uniquePreparation($totalQty, $orderPreparation, $preparationArr = null, $enhanceQty = null, $enhance = null)
    {
        $preArr[]   = null;
        $unique     = null;
        $qtyy       = 0;

        //same qty preaparation array========
        $preArr = OrderPreparation::getPreparationArr($totalQty, $orderPreparation, $enhanceQty, $enhance);

        // remove enhance qty==========
        if (!empty($enhanceQty) && empty($enhance)) :
            foreach ($enhanceQty as $qtyKey => $eQty) :
                unset($preArr[$qtyKey]);
            endforeach;
        endif;

        // get same preparation qty count==========
        if (!empty($preparationArr)) :
            foreach ($preArr as $pre) :
                if ($preparationArr == $pre) {
                    $qtyy++;
                }
            endforeach;
            return $qtyy;
        endif;

        $unique = array_map("unserialize", array_unique(array_map("serialize", $preArr)));
        return $unique;
    }



    protected static function getPreparationArr($totalQty = null, $orderPreparation = null, $enhanceQty = null, $enhance = null)
    {
        if (!empty($enhance)) :
            // only enhance qty==========
            foreach ($enhanceQty as $qtyKey => $eQty) :
                foreach ($orderPreparation as $preparation) :
                    if ($preparation->qty == $qtyKey) :
                        $preArr[$qtyKey][] = $preparation->preparation_id;
                    endif;
                endforeach;
            endforeach;
        else :

            // all preparation qty==========
            for ($i = 1; $i <= $totalQty; $i++) {
                foreach ($orderPreparation as $preparation) :
                    if ($preparation->qty == $i) :
                        $preArr[$i][] = $preparation->preparation_id;
                    endif;
                endforeach;
            }
        endif;
        $preArr = array_filter($preArr);

        return $preArr;
    }
}
