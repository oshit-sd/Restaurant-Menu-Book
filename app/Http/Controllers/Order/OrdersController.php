<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Order;

use App\Traits\Utility;
use App\Model\Order\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    use Utility;

    public function index()
    {
        $title      = "Orders List";
        $getOrders  = Orders::GetOrders();
        return view('BackEnd.orders.orders_list', compact('getOrders', 'title'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($orderId)
    {
        $orders     = Orders::showOrder($orderId);
        return view('BackEnd.orders.order_invoice', compact('orders'));
    }


    public function edit(Orders $orders)
    {
        //
    }

    public function update(Request $request, Orders $orders)
    {
        //
    }


    public function destroy(Orders $orders)
    {
        //
    }
}
