<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers;

use DB;
use Cart;
use App\Model\Category;
use App\Traits\ShopCart;
use App\Model\Order\Orders;
use Illuminate\Http\Request;
use App\Traits\changeTableStatus;
use App\Model\Menuitem\Menuitems;
use App\Model\Order\OrderCondiments;
use App\Model\Order\OrderDetails;
use App\Model\Order\OrderIngredinent;
use App\Model\Order\OrderMessage;
use App\Model\Order\OrderPreparation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ShoppingCart extends Controller
{
    use ShopCart;
    use changeTableStatus;

    public function destroyCart()
    {
        cart::destroy();
        Session::forget('cartQty');
        echo "success";
    }

    /*
     * Preparatione Popup
     */
    public function preparationPopup($qty, $menuID, $categoryID, $condiment)
    {
        // cart::destroy();
        Session::forget('preparation');
        Session::forget('qty');
        $qty++;
        $title              = "Select Preparation";
        $item               = Menuitems::find($menuID);
        $preparationGroup   = $item->preparation_group;

        return view(
            'FrontEnd.shopping_cart.preparation_popup',
            compact('title', 'qty', 'menuID', 'categoryID', 'preparationGroup', 'condiment')
        );
    }
    /*
     * Add to cart with preparation
     */
    public function addToCartWithPreparation(Request $request)
    {
        return $this->addToCart($request->menuID, $request->categoryID, $request->preparation);
    }
    /*
     * preparation next
     */
    public function preparationNext(Request $request)
    {
        Session::put('qty', $request->qty);
        Session::put('preparation', $request->preparation);
        return $this->condimentsPopup($request->menuID, $request->categoryID);
    }


    /*
     * Condiments Popup
     */
    public function condimentsPopup($menuID, $categoryID)
    {
        $title              = "Select Condiments";
        $item               = Menuitems::find($menuID);
        $qty                = Session::get('qty');
        $condimentGroup     = $item->condiments_group;

        return view(
            'FrontEnd.shopping_cart.condiment_popup',
            compact('title', 'qty', 'menuID', 'categoryID', 'condimentGroup')
        );
    }
    /*
     * Add to cart with condiments
     */
    public function addToCartWithCondiments(Request $request)
    {
        return $this->addToCart($request->menuID, $request->categoryID, Session::get('preparation'), $request->condiments);
    }


    /*
     * Cart List==========
     */
    public function cartList()
    {
        $title          = "Shopping Cart";
        $category       = Category::getCategory();
        $cartContent    = Cart::content();
        // dd($cartContent);
        return view('FrontEnd.shopping_cart.cart_list', compact('title', 'cartContent', 'category'));
    }

    /*
     * Add to Cart==========
     */
    public function addToCart($menuID, $cid, $preparation = null, $condiments = null)
    {
        $title      = "Shopping Cart";
        $portion    = Input::get('portion');

        if (!empty($menuID)) :
            $data = Menuitems::find($menuID);
            $cartData = array(
                'id'        => $menuID,
                'name'      => $data->fld_name,
                'qty'       => 1,
                'price'     => $data->fld_price,
                'options'   => [
                    'category'      => $cid,
                    'preparation'   => $preparation,
                    'condiments'    => $condiments,
                    'enhanceQty'    => null,
                    'with_id'       => null,
                    'without_id'    => null,
                    'extra_id'      => null,
                    'message'       => null,
                    'image'         => $data->fld_image,
                    'description'   => $data->fld_description
                ]
            );

            $ii = 0;
            //check exist item in cart=====
            $cartContent   = Cart::content();
            if ($cartContent) :
                foreach ($cartContent as $cData) :
                    if ($cData->id == $menuID) :
                        $ii++;
                        $rowID = $cData->rowId;
                    endif;
                endforeach;
            endif;

            //check exist item in cart=====
            if ($ii == 0) :
                Cart::add($cartData);
            else :
                $getItem   = Cart::get($rowID);
                $this->updateCart($cartData, $getItem);
            endif;

            $cart   = Cart::content();

            if ($cart) :
                // Update table status=================
                $this->updateTableStatus('op', Session::get('TableInfo')['tableID']);

                if ($portion != "CartList" || !empty($portion)) :
                    $qtySubtotal['menuID']      = $menuID;
                    $qtySubtotal['totalQty']    = Cart::count();
                    $qtySubtotal['subTotal']    = Cart::subtotal();
                    return $qtySubtotal;

                elseif (empty($portion)) :
                    echo json_encode(true);

                elseif ($portion == "CartList") :
                    return view('FrontEnd.shopping_cart.cart_list_page', compact('cart', 'title'));
                endif;
            else :
                $data['error'] = "Cart Data Added unsuccessfully!!";
                return $data;
            endif;

        endif;
    }


    private function updateCart($newItem, $item)
    {
        $preparation    = null;
        $condiments     = null;

        if (!is_null($item->options->preparation)) :
            $preparation    = $item->options->preparation + $newItem['options']['preparation'];
        endif;

        if (!is_null($item->options->condiments)) :
            $condiments     = $item->options->condiments + $newItem['options']['condiments'];
        endif;

        $cartData = array(
            'id'        => $item->id,
            'name'      => $item->name,
            'qty'       => $item->qty + 1,
            'price'     => $item->price,
            'options'   => [
                'category'      => $item->options->category,
                'preparation'   => $preparation,
                'condiments'    => $condiments,
                'enhanceQty'    => $item->options->enhanceQty,
                'with_id'       => $item->options->with_id,
                'without_id'    => $item->options->without_id,
                'extra_id'      => $item->options->extra_id,
                'message'       => $item->options->message,
                'image'         => $item->options->image,
                'description'   => $item->options->description
            ]
        );

        Cart::update($item->rowId, $cartData);
    }

    /*
     * Remove to Cart==========
     */
    public function removeToCart($rowId)
    {
        $title      = "Shopping Cart";
        $category   = Category::getCategory();
        $portion    = Input::get('portion');
        $qty        = Input::get('qty');
        $cartItem   = Cart::get($rowId);
        if (!empty($rowId)) :
            $addID          = Cart::update($rowId, ($qty - 1));
            $cartContent    = Cart::content();

            if ($cartContent) :
                if ($portion != "cartList") :
                    $data['menuID']   = !empty($cartItem->id) ? $cartItem->id : "";
                    $data['totalQty'] = Cart::count();
                    $data['subTotal'] = Cart::subtotal();
                    return $data;

                elseif ($portion == "cartList") :
                    return view('FrontEnd.shopping_cart.cart_list', compact('title', 'cartContent', 'category'));
                endif;

            else :
                $data['error'] = "Cart Item Remove unsuccessfully!!";
                return $data;
            endif;
        endif;
    }

    /*
     * Single Item Qty Page==========
     */
    public function singleItemQtyPage($rowId)
    {
        $title  = "Remove Qty From Cart";
        $cart   = Cart::get($rowId);
        // get items data=================
        $Item   = Menuitems::find($cart->id);
        return view('FrontEnd.shopping_cart.single_item_qty', compact('title', 'cart', 'Item'));
    }

    /*
     * Remove Singlw Qty From Cart==========
     */
    public function removeSingleQty($rowId)
    {
        $withArr        = null;
        $withoutArr     = null;
        $extraArr       = null;
        $messageArr     = null;
        $preparationArr = null;
        $condimentsArr  = null;
        $qtyArr         = null;
        $qty            = Input::get('qty');
        $totalQty       = Input::get('totalQty');
        $enhanceQtyy    = Session::get('cartQty');

        if (!empty($rowId)) :
            $cartItem = Cart::get($rowId);

            // remove with qty from cart=============
            $withArr = $this->removeQtyFromCart($cartItem->options->with_id, $qty);

            // remove without qty from cart=============
            $withoutArr = $this->removeQtyFromCart($cartItem->options->without_id, $qty);

            // remove extra qty from cart=============
            $extraArr = $this->removeQtyFromCart($cartItem->options->extra_id, $qty);

            // remove message qty from cart=============
            $messageArr = $this->removeQtyFromCart($cartItem->options->message, $qty);

            // remove preparation qty from cart=============
            $preparationArr = $this->removeQtyFromCart($cartItem->options->preparation, $qty);

            // remove condiments qty from cart=============
            $condimentsArr = $this->removeQtyFromCart($cartItem->options->condiments, $qty);

            //remove enhancement qty with preparation===========
            $this->removeEnhanceQtyPreparation($enhanceQtyy, $qty, $cartItem->id);

            // cart data update===============
            Cart::update($rowId, [
                'id'        => $cartItem->id,
                'name'      => $cartItem->name,
                'qty'       => $totalQty - 1,
                'price'     => $cartItem->price,
                'options' => [
                    'category'      => $cartItem->options->category,
                    'preparation'   => $preparationArr,
                    'condiments'    => $condimentsArr,
                    'enhanceQty'    => $cartItem->options->enhanceQty,
                    'with_id'       => $withArr,
                    'without_id'    => $withoutArr,
                    'extra_id'      => $extraArr,
                    'message'       => $messageArr,
                    'image'         => $cartItem->options->image,
                    'description'   => $cartItem->options->description
                ]
            ]);

        endif;

        echo json_encode(true);
    }



    // Delete Cart=============
    public function deleteCart($rowId = null)
    {
        Cart::remove($rowId);
        echo json_encode(true);
    }


    // item Enhancement=============
    public function itemEnhancement($rowId, $active_qty)
    {
        $title  = "Edit Item";
        $cart   = Cart::get($rowId);
        $Item   = Menuitems::find($cart->id);
        //        dd(Cart::content());
        return view('FrontEnd.shopping_cart.item_enhancement', compact('title', 'active_qty', 'Item', 'cart'));
    }

    // Submit item Enhancement=============
    public function submitEnhance(Request $request)
    {
        $qtyArr     = [];
        $newQtyArr  = "";
        $activeTab  = $request->activeTab;
        $active_qty = $request->enhanceQty;
        $rowId      = $request->rowId;
        $menuId     = $request->menuId;
        $sessionQty = Session::get('cartQty');
        // get item data=================
        $Item       = Menuitems::find($menuId);
        // get cart data=================
        $cartItem   = Cart::get($rowId);

        //check exist data in cart===============
        if (isset($cartItem)) :
            //with check====
            $withID     = $this->enhanceAddRemove($cartItem->options->with_id, $request->with_id, $active_qty);

            //without check====
            $withoutID  = $this->enhanceAddRemove($cartItem->options->without_id, $request->without_id, $active_qty);

            //extra check====
            $extraID    = $this->enhanceAddRemove($cartItem->options->extra_id, $request->extra_id, $active_qty);

            //message check====
            $message    = $this->enhanceAddRemove($cartItem->options->message, $request->message, $active_qty);

        else :
            $withID     = $request->with_id;
            $withoutID  = $request->without_id;
            $extraID    = $request->extra_id;
            $message    = $request->message;
        endif;

        $qtyArr[$cartItem->id][] = $active_qty;

        if (!empty($sessionQty)) :
            if (array_key_exists($cartItem->id, $sessionQty) && !empty($qtyArr)) {
                array_push($sessionQty[$cartItem->id], $qtyArr[$cartItem->id][0]);
                $newQtyArr  = $sessionQty;
            } else {
                $newQtyArr  = $sessionQty + $qtyArr;
            }
            Session::put('cartQty', $newQtyArr);
        else :
            Session::put('cartQty', $qtyArr);
        endif;

        $cartUpdate =  Cart::update($rowId, [
            'id'        => $cartItem->id,
            'name'      => $cartItem->name,
            'qty'       => $cartItem->qty,
            'price'     => $cartItem->price,
            'options' => [
                'category'      => $cartItem->options->category,
                'preparation'   => $cartItem->options->preparation,
                'condiments'    => $cartItem->options->condiments,
                'enhanceQty'    => $cartItem->options->enhanceQty,
                'with_id'       => $withID,
                'without_id'    => $withoutID,
                'extra_id'      => $extraID,
                'message'       => $message,
                'image'         => $cartItem->options->image,
                'description'   => $cartItem->options->description
            ]
        ]);

        //get data from cart==============
        $cart = Cart::get($cartUpdate->rowId);
        //        dd($cart);

        if ($cart) {
            return view('FrontEnd.shopping_cart.item_enhancement', compact('active_qty', 'Item', 'cart', 'activeTab'));
        } else {
            return false;
        }
    }


    // Confirm Order===========
    public function orderStore()
    {
        $orderNumber    =  $this->generateCode("ORD-");
        $tableID        = Session::get('TableInfo')['tableID'];
        $cartContent    = Cart::content();

        if (count($cartContent) > 0) :
            try {
                DB::beginTransaction();
                //store order===========
                $orderID = Orders::store($orderNumber);
                Session::put('orderID', $orderID);

                // shopping cart data=============
                foreach ($cartContent as $cart) :
                    // Store order details=========
                    $detailsID = OrderDetails::store(
                        $cart->qty,
                        $cart->price,
                        $orderID,
                        $cart->id,
                        $cart->options->category
                    );
                    // get individual id in array===========
                    $preparationArr = $this->getArrID($cart->options->preparation);
                    $condimentsArr  = $this->getArrID($cart->options->condiments);
                    $withArr        = $this->getArrID($cart->options->with_id);
                    $withoutArr     = $this->getArrID($cart->options->without_id);
                    $extraArr       = $this->getArrID($cart->options->extra_id);
                    $messageArr     = $cart->options->message;

                    // Store in database========
                    if (!is_null($preparationArr)) :
                        OrderPreparation::store($preparationArr, $detailsID);
                    endif;
                    if (!is_null($condimentsArr)) :
                        OrderCondiments::store($condimentsArr, $detailsID);
                    endif;
                    if (!is_null($withArr)) :
                        OrderIngredinent::store($withArr, $detailsID, 1);
                    endif;
                    if (!is_null($withoutArr)) :
                        OrderIngredinent::store($withoutArr, $detailsID, 2);
                    endif;
                    if (!is_null($extraArr)) :
                        OrderIngredinent::store($extraArr, $detailsID, 3);
                    endif;
                    if (!is_null($messageArr)) :
                        OrderMessage::store($messageArr, $detailsID);
                    endif;
                endforeach;

                // Update table status=================
                $this->updateTableStatus('va', $tableID);
                // Update booking table status=================
                $this->updateBookingTableStatus($tableID);

                if ($orderID && $detailsID) {
                    $res = 1;
                    DB::commit();
                } else {
                    $res = 0;
                    DB::rollBack();
                }
                cart::destroy();
                $this->after_process_message($res, "Order Confirm");
            } catch (Exception $ex) {
                DB::rollBack();
                $this->after_process_message(false, "Order Confirm");
            }
        endif;
    }


    public function __construct()
    {
        $this->middleware(['auth:web']);
    }
}
