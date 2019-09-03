<?php

namespace App\Model\Order;

use App\Model\Ingredient\Ingredient;
use Illuminate\Database\Eloquent\Model;

class OrderIngredinent extends Model
{
    protected $guarded = [];

    /*
     * Store information=====
     */
    public static function store($ingredints, $orderDetailsID, $type)
    {
        foreach ($ingredints as $IngID) :
            $price = Ingredient::getPrice($IngID[2]);
            $arr = [
                'qty'                   => $IngID[0],
                'price'                 => $price,
                'enhance_type'          => $type,
                'order_details_id'      => $orderDetailsID,
                'ingredinent_group_id'  => $IngID[1],
                'ingredinent_id'        => $IngID[2]
            ];
            $res = OrderIngredinent::insert($arr);
        endforeach;

        if ($res) :
            return true;
        else :
            return false;
        endif;
    }

    /*
     * unique qty Ingredinent
     */
    public static function ingredinent($totalQty, $orderIngredient)
    {
        $ingArr[]       = null;
        $qtyEnahnce[]   = null;

        for ($i = 1; $i <= $totalQty; $i++) {
            foreach ($orderIngredient as $ingredient) :
                if ($ingredient->qty == $i) :
                    $qtyEnahnce[$i][] = $i;
                    $ingArr[$ingredient->enhance_type][$i][] = $ingredient->ingredinent_id;
                endif;
            endforeach;
        }

        $data = [
            'ingredientArr'     => array_filter($ingArr),
            'qtyEnahnce'        => array_filter($qtyEnahnce)
        ];
        return $data;
    }
}
