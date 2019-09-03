<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Category;

use App\Model\Category;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('category/create');
    }


    public function create()
    {
        $title      = "Category Entry";
        $getData    = Category::GetCategory();

        return view(
            'BackEnd.category.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Category::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Category $category)
    {
        return redirect('category/create');
    }

    public function edit(Category $category)
    {
        $editData = $category;
        return view('BackEnd.category.edit', compact('editData'));
    }

    public function update(Request $request, Category $category)
    {
        if ($this->validationCheck($request)) :
            $res    = $category->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Category::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_category' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_category.required' => 'Category Name is required'
        ];
    }
}
