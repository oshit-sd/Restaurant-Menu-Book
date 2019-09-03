<?php

namespace App\Model\Order;

use App\Model\Category;
use App\Model\Menuitem\Menuitems;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];

    public function scopeGetMealCourse()
    {
        return OrderDetails::select(
            'id',
            'orders_id',
            'menuitems_id',
            'qty',
            'price'
        )
            ->where('fld_status', 'a')->get();
    }

    protected static function store($qty, $price, $orderID, $id, $category)
    {
        $orderDetailsArr = [
            'qty'           => $qty,
            'price'         => $price,
            'orders_id'     => $orderID,
            'menuitems_id'  => $id,
            'category_id'   => $category
        ];
        $detailsID = OrderDetails::create($orderDetailsArr);

        if ($detailsID) :
            return $detailsID->id;
        else :
            return false;
        endif;
    }

    public function orderItem()
    {
        return $this->hasOne(Menuitems::class, 'id', 'menuitems_id')
            ->select('fld_name', 'fld_subcategory_id')
            ->where('fld_status', 'a');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)
            ->select('fld_category')
            ->where('fld_status', 'a');
    }

    public function orderPreparation()
    {
        return $this->hasMany(OrderPreparation::class)
            ->select('qty', 'price', 'preparation_id');
    }

    public function orderCondiments()
    {
        return $this->hasMany(OrderCondiments::class)
            ->select('qty', 'price', 'condiments_id');
    }

    public function orderIngredient()
    {
        return $this->hasMany(OrderIngredinent::class)
            ->select('qty', 'price', 'ingredinent_id', 'enhance_type');
    }

    public function orderMessage()
    {
        return $this->belongsToMany(OrderMessage::class);
    }
}
