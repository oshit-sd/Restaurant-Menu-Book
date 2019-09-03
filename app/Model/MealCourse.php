<?php

namespace App\Model;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class MealCourse extends Model
{
    protected $guarded = [];

    public function scopeGetMealCourse()
    {
        return MealCourse::select(
            'id',
            'fld_name',
            'fld_course_level'
        )
            ->where('fld_status', 'a')->orderBy('id', 'desc')->get();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->where('fld_status', 'a');
    }
}
