<?php

namespace App\Model\Order;

use App\Model\Condiment\Condiments;
use Illuminate\Database\Eloquent\Model;

class OrderCondiments extends Model
{
    protected $guarded = [];

    /*
     * Store information=====
     */
    protected static function store($condiments, $orderDetailsID)
    {
        foreach ($condiments as $condID) :
            $price = Condiments::getPrice($condID[2]);
            $arr = [
                'qty'                   => $condID[0],
                'price'                 => $price,
                'order_details_id'      => $orderDetailsID,
                'condiments_group_id'   => $condID[1],
                'condiments_id'         => $condID[2]
            ];
            $res = OrderCondiments::insert($arr);
        endforeach;

        if ($res) :
            return true;
        else :
            return false;
        endif;
    }


    /*
     * unique Condiments
     */
    public static function uniqueCondiments($totalQty, $orderCondiments, $CondimentsArr = null, $enhanceQty = null, $enhance = null)
    {
        $preArr[]   = null;
        $unique     = null;

        //same qty preaparation array========
        $preArr = OrderCondiments::getCondimentsArr($totalQty, $orderCondiments, $enhanceQty, $enhance);

        // remove enhance qty==========
        if (!empty($enhanceQty) && empty($enhance)) :
            foreach ($enhanceQty as $qtyKey => $eQty) :
                unset($preArr[$qtyKey]);
            endforeach;
        endif;

        $unique = array_map("unserialize", array_unique(array_map("serialize", $preArr)));
        return $unique;
    }


    protected static function getCondimentsArr($totalQty = null, $orderCondiments = null, $enhanceQty = null, $enhance = null)
    {
        if (!empty($enhance)) :
            // only enhance qty==========
            foreach ($enhanceQty as $qtyKey => $eQty) :
                foreach ($orderCondiments as $condiments) :
                    if ($condiments->qty == $qtyKey) :
                        $preArr[$qtyKey][] = $condiments->condiments_id;
                    endif;
                endforeach;
            endforeach;
        else :

            // all Condiments qty==========
            for ($i = 1; $i <= $totalQty; $i++) {
                foreach ($orderCondiments as $condiments) :
                    if ($condiments->qty == $i) :
                        $preArr[$i][] = $condiments->condiments_id;
                    endif;
                endforeach;
            }
        endif;
        $preArr = array_filter($preArr);

        return $preArr;
    }


    /*
     * get condiment ID=====
     */
    public static function getCondimentsID($qty = null, $detailsID = null)
    {
        $id = OrderCondiments::select('condiments_id')
            ->where('qty', $qty)
            ->where('order_details_id', $detailsID)->first();
        if ($id) {
            return $id->condiments_id;
        } else {
            return "";
        }
    }
}
