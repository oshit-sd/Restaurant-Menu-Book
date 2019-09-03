<?php

namespace App\Model\Menuitem;

use App\Model\Dietary;
use App\Model\Allergy;
use App\Model\Spicelevel;
use App\Model\MealCourse;
use App\Model\Subcategory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Condiment\CondimentsGroup;
use App\Model\Ingredient\IngredientGroup;
use App\Model\Preparation\PreparationGroup;

class Menuitems extends Model
{
    protected $guarded = [];

    public function scopeGetMenuitems()
    {
        return Menuitems::select(
            'id',
            'fld_name',
            'fld_price',
            'fld_price_type',
            'fld_subcategory_id',
            'fld_image',
            'fld_description',
            'fld_serial_numbr',
            'fld_spice_level',
            'fld_meal_course',
            'fld_name_show'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->paginate(10);
    }


    public function scopeGetMenuitemsForHome()
    {
        return Menuitems::select(
            'id',
            'fld_name',
            'fld_price',
            'fld_price_type',
            'fld_subcategory_id',
            'fld_image',
            'fld_description',
            'fld_serial_numbr',
            'fld_spice_level',
            'fld_meal_course',
            'fld_name_show'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->paginate(20);
    }

    // Many to Many relationship===============
    public function dietaries()
    {
        return $this->belongsToMany(Dietary::class)->where('fld_status', 'a');
    }

    public function condiments_group()
    {
        return $this->belongsToMany(CondimentsGroup::class)->where('fld_status', 'a');
    }

    public function preparation_group()
    {
        return $this->belongsToMany(PreparationGroup::class)->where('fld_status', 'a');
    }

    public function ingredient_group()
    {
        return $this->belongsToMany(IngredientGroup::class)->where('fld_status', 'a');
    }

    public function ingredient_with()
    {
        return $this->belongsToMany(IngredientGroup::class)
            ->where('fld_with', 1)
            ->where('fld_status', 'a');
    }

    public function ingredient_without()
    {
        return $this->belongsToMany(IngredientGroup::class)
            ->where('fld_without', 1)
            ->where('fld_status', 'a');
    }

    public function ingredien_extras()
    {
        return $this->belongsToMany(IngredientGroup::class)
            ->where('fld_extras', 1)
            ->where('fld_status', 'a');
    }

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class)->where('fld_status', 'a');
    }

    //One To One Relationship==========
    public function subCategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'fld_subcategory_id');
    }

    public function SpiceLevel()
    {
        return $this->hasOne(Spicelevel::class, 'id', 'fld_spice_level');
    }

    public function MealCourse()
    {
        return $this->hasOne(MealCourse::class, 'id', 'fld_meal_course');
    }
}
