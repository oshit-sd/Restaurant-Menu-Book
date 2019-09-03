<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Category;

use DB;
use Exception;
use App\Model\Category;
use App\Traits\Utility;
use App\Model\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('subcategory/create');
    }


    public function create()
    {
        $title          = "Subcategory Entry";
        $getData        = Subcategory::GetSubcategory();
        $getCategory    = Category::GetCategory();

        return view(
            'BackEnd.subcategory.create',
            compact('title', 'getData', 'getCategory')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            try {
                DB::beginTransaction();
                $subCategory = new Subcategory;
                $subCategory->fld_subcategory = $request->fld_subcategory;
                $subCategory->fld_front_size = $request->fld_front_size;
                $subCategory->fld_bold = $request->fld_bold;
                $res = $subCategory->save();

                foreach ($request->fld_category_id as $id) :
                    $res2 = $category = Category::find($id);
                    $subCategory->categories()->attach($category);
                endforeach;

                if ($res && $res2) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }

                $this->after_process_message($res2, "Save");
            } catch (Exception $ex) {
                DB::rollBack();
                $this->after_process_message(false, "Save");
            }
        endif;
    }


    public function show(Subcategory $subcategory)
    {
        return redirect('subcategory/create');
    }

    public function edit(Subcategory $subcategory)
    {
        $getCategory    = Category::GetCategory();
        $editData       = $subcategory;
        return view('BackEnd.subcategory.edit', compact('editData', 'getCategory'));
    }

    public function removeCategory($id, $sid)
    {
        $info = Subcategory::find($sid);
        $cate = Category::find($id);
        $res = $info->categories()->detach($cate);
        $this->after_process_message($res, "Remove");
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        if (!empty($request->old_category) == 1 || !empty($request->fld_category_id)) :
            try {
                DB::beginTransaction();
                foreach ($request->fld_category_id as $id) :
                    $res = $category = Category::find($id);
                    $subcategory->categories()->attach($category);
                endforeach;

                $request->offsetUnset('old_category');
                $res2 = $subcategory->update($request->all());

                if ($res2 && is_null($request->fld_preparation_id) || $res) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }

                return redirect('subcategory/create')
                    ->with('success', 'Update Successfully!!');
            } catch (Exception $ex) {
                DB::rollBack();

                return redirect('subcategory/create')
                    ->with('errorMsg', 'Update Unsuccessfully!!');
            } else :
            return redirect('subcategory/' . $subcategory->id . '/edit')
                ->with('errorMsg', 'Please select minimum 1 Category');
        endif;
    }

    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Subcategory::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    protected function rules()
    {
        return [
            'fld_category_id' => 'required',
            'fld_subcategory' => 'required'
        ];
    }

    // Validation Message=======
    protected function messages()
    {
        return [
            'fld_category_id.required' => 'Category Name is required',
            'fld_subcategory.required' => 'Sub-Category Name is required',
        ];
    }
}
