<?php

namespace App\Model\Ingredient;

use Illuminate\Database\Eloquent\Model;

class IngredientGroup extends Model
{
    protected $guarded = [];

    public function scopeGetIngredientGroup()
    {
        return IngredientGroup::select(
            'id',
            'fld_name',
            'fld_with',
            'fld_without',
            'fld_extras'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }


    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class)->where('fld_status', 'a');
    }
}
