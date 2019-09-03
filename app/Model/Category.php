<?php

namespace App\Model;

use App\Model\Condiments;
use App\Model\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function scopeGetCategory()
    {
        return Category::select('id', 'fld_category')
            ->where('fld_status', 'a')
            ->orderBy('id', 'desc')->get();
    }

    public function scopeGetCategoryForHome()
    {
        return Category::select('id', 'fld_category')
            ->orderBy('id', 'asc')
            ->where('fld_status', 'a')->get();
    }

    public static function getCategory()
    {
        return Category::select('id', 'fld_category')
            ->where('fld_status', 'a')->get();
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class)->where('fld_status', 'a');
    }

    public function condiments()
    {
        return $this->belongsToMany(Condiments::class)->where('fld_status', 'a');
    }
}
