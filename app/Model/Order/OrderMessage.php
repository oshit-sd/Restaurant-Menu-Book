<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;

class OrderMessage extends Model
{
    protected $guarded = [];

    /*
     * Store information=====
     */
    protected static function store($messages, $orderDetailsID)
    {
        foreach ($messages as $key => $msg) :
            $arr = [
                'qty'               => $key,
                'message'           => $msg,
                'order_details_id'  => $orderDetailsID,
            ];
            $res = OrderMessage::insert($arr);
        endforeach;

        if ($res) :
            return true;
        else :
            return false;
        endif;
    }

    /*
     * qty message=====
     */
    public static function message($qty, $detailsID)
    {
        $res = OrderMessage::select('message')
            ->where('qty', $qty)
            ->where('order_details_id', $detailsID)->first();
        if ($res) :
            return $res->message;
        else :
            return false;
        endif;
    }
}
