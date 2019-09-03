<?php

namespace App\Traits;

use Session;

trait ShopCart
{
    /*
     * Remove qty from cart============
     */
    private function removeQtyFromCart($portion = null, $qty = null)
    {
        $newArr = null;
        if (is_array($portion)) :
            foreach ($portion as $key => $cartQty) :
                if ($qty != $key) {
                    if ($qty < $key) :
                        $newArr[$key - 1] = $cartQty;
                    else :
                        $newArr[$key] = $cartQty;
                    endif;
                }
            endforeach;
        endif;

        return $newArr;
    }



    /*
     * remove enhancement qty with preparation===========
     */
    private function removeEnhanceQtyPreparation($enhanceQtyy = null, $qty = null, $itemID = null)
    {
        $newArr = null;
        if (!empty($enhanceQtyy)) {
            foreach ($enhanceQtyy as $key1 => $rqty) {
                foreach ($rqty as $key2 => $singleRQty) {
                    if ($singleRQty == $qty) {
                        $countt = count($enhanceQtyy[$itemID]);
                        if ($countt == 1) :
                            unset($enhanceQtyy[$itemID]);
                        else :
                            $newArr = $this->array_indexing_remove($enhanceQtyy[$itemID], $qty);
                            $enhanceQtyy[$itemID] = $newArr;
                        // dd($enhanceQtyy);
                        endif;
                        // dd($enhanceQtyy);
                        Session::put('cartQty', $enhanceQtyy);
                    }
                }
            }
        }
    }

    /*
     * array indexing============
     */
    private function array_indexing_remove($portion = null, $qty = null)
    {
        $newArr = null;
        if (is_array($portion)) :
            foreach ($portion as $key => $cartQty) :
                if ($qty != $cartQty) {
                    if ($qty < $cartQty) :
                        $newArr[$key - 1] = $cartQty;
                    else :
                        $newArr[$key] = $cartQty;
                    endif;
                }
            endforeach;
        endif;

        return $newArr;
    }




    /*
     * Enhance Add And rmeove from Array============
     */
    private function enhanceAddRemove($portion = null, $requestData = null, $active_qty = null)
    {
        $exitItem = 0;
        if (!empty($portion) || !is_null($portion)) {
            $exitItem = 1;
        }

        if ($exitItem > 0 && !empty($requestData)) {
            if (array_key_exists($active_qty, $portion)) {
                $portionArr = array_replace($portion, $requestData);
            } else {
                $portionArr = $portion + $requestData;
            }
        } else {
            if ($exitItem > 0 && empty($requestData)) {
                foreach ($portion as $key => $withQty) :
                    if ($active_qty != $key) {
                        if ($active_qty < $key) :
                            $portionArr[$key] = $withQty;
                        else :
                            $portionArr[$key] = $withQty;
                        endif;
                    }
                endforeach;
            } else {
                $portionArr = $requestData;
            }
        }

        return $portionArr;
    }



    /*
     * Enhance Message Add And rmeove from Array============
     */
    private function enhanceMesgAddRemove($portion = null, $requestData = null, $active_qty = null)
    {
        $exitItem = 0;
        if (!empty($portion) || !is_null($portion)) {
            $exitItem = 1;
        }

        if ($exitItem > 0 && !empty($requestData)) {
            if (array_key_exists($active_qty, $portion)) {
                $message = array_replace($portion, $requestData);
            } else {
                $message = $portion + $requestData;
            }
        } else {
            $message = $requestData;
        }

        return $message;
    }



    /*
     * return id when data store in confirm order 
     */
    private function getArrID($portion = null)
    {
        if (!is_null($portion)) :
            foreach ($portion as $pqty => $preparationGroup) :
                foreach ($preparationGroup as $grp  => $preparation) :
                    foreach ($preparation as $preID) :

                        $data[] =  [$pqty, $grp, $preID];

                    endforeach;
                endforeach;
            endforeach;
            return $data;
        endif;
    }
}
