<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem;

use App\Model\Category;
use App\Traits\Utility;
use App\Model\MealCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealCourseController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('MealCourse/create');
    }


    public function create()
    {
        $title          = "Meal Course Entry";
        $getCategory    = Category::GetCategory();
        $getData        = MealCourse::GetMealCourse();

        return view(
            'BackEnd.meal_course.create',
            compact('title', 'getData', 'getCategory')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $condiments = new MealCourse;
            $condiments->fld_name = $request->fld_name;
            $condiments->fld_course_level = $request->fld_course_level;
            $res = $condiments->save();

            foreach ($request->fld_category_id as $par) :
                $category = Category::find($par);
                $condiments->categories()->attach($category);
            endforeach;

            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(MealCourse $MealCourse)
    {
        return redirect('Mealcourse/create');
    }

    public function edit(MealCourse $MealCourse)
    {
        $getCategory    = Category::GetCategory();
        $editData       = $MealCourse;
        return view('BackEnd.meal_course.edit', compact('editData', 'getCategory'));
    }


    public function removeCategory($id, $cid)
    {
        $info = MealCourse::find($cid);
        $cate = Category::find($id);
        $res = $info->categories()->detach($cate);
        $this->after_process_message($res, "Remove");
    }

    public function update(Request $request, MealCourse $MealCourse)
    {
        if (!empty($request->fld_category_id)) :
            foreach ($request->fld_category_id as $id) :
                $category = Category::find($id);
                $MealCourse->categories()->attach($category);
            endforeach;
        endif;

        $request->offsetUnset('fld_category_id');
        $data = $request->all();
        $res = $MealCourse->update($data);

        return redirect('MealCourse/create')
            ->with('success', 'Update Successfully!!');
    }

    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = MealCourse::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name'          => 'required',
            'fld_course_level'  => 'required',
            'fld_category_id'   => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required'         => 'Name is required',
            'fld_course_level.required' => 'Course Level is required',
            'fld_category_id.required'  => 'Category Name is required'
        ];
    }
}
