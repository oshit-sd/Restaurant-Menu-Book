<?php

namespace App\Model;

use App\Model\Category;
use App\Model\Menuitem\Menuitems;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    public function scopeGetSubcategory()
    {
        return Subcategory::select(
            'id',
            'fld_subcategory',
            'fld_front_size',
            'fld_bold'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->where('fld_status', 'a');;
    }

    public function items()
    {
        return $this->hasMany(Menuitems::class, 'fld_subcategory_id', 'id')
            ->where('fld_status', 'a');
    }
}
