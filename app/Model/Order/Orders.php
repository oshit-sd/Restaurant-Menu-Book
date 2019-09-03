<?php

namespace App\Model\Order;

use Auth;
use Cart;
use Session;
use App\Model\BookingTable;
use App\Model\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];

    public function scopeGetOrders()
    {
        return Orders::select(
            'id',
            'order_number',
            'total_qty',
            'total_amount',
            'table_id',
            'user_id',
            'booking_table_id',
            'created_at'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->paginate(20);
    }

    /*
     * Store information=====
     */
    protected static function store($order_number)
    {
        $bookingId = Session::get('TableInfo')['bookingId'];
        $tableID  = Session::get('TableInfo')['tableID'];
        $orderArr = [
            'order_number'      => $order_number,
            'total_qty'         => Cart::count(),
            'total_amount'      => Cart::subtotal(),
            'table_id'          => $tableID,
            'user_id'           => Auth::user()->id,
            'booking_table_id'  => $bookingId
        ];
        $order = Orders::create($orderArr);

        if ($order) :
            return $order->id;
        else :
            return false;
        endif;
    }

    /*
     * show orders=====
     */
    public static function showOrder($orderId = null)
    {
        return Orders::select(
            'id',
            'table_id',
            'order_number',
            'total_qty',
            'total_amount',
            'created_at'
        )
            ->where('fld_status', 'a')
            ->where('id', $orderId)->get(20);
    }


    // Relationships==========
    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class)->select('fld_name');
    }

    public function orderTableInfo()
    {
        return $this->hasOne(BookingTable::class);
    }
}
