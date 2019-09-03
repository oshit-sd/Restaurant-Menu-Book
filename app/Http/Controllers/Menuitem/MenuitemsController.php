<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem;

use DB;
use Exception;
use App\Model\Dietary;
use App\Model\Allergy;
use App\Traits\Utility;
use App\Model\Category;
use App\Model\MealCourse;
use App\Model\Spicelevel;
use App\Model\Subcategory;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Model\Menuitem\Menuitems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Condiment\CondimentsGroup;
use App\Model\Ingredient\IngredientGroup;
use App\Model\Preparation\PreparationGroup;


class MenuitemsController extends Controller
{
    use Utility;
    use ImageUpload;

    public function index()
    {
        $title          = "Menu Item List";
        $getCategory    = Category::GetCategory();
        $getSubcategory = Subcategory::GetSubcategory();
        $getData        = Menuitems::GetMenuitems();

        return view(
            'BackEnd.menu_items.index',
            compact('title', 'getData', 'getCategory', 'getSubcategory')
        );
    }

    public function categoryWiseItem(Category $category)
    {
        return view(
            'BackEnd.menu_items.category_wise_item',
            compact('category')
        );
    }

    public function subCategoryWiseItem(Subcategory $subcategory)
    {
        return view(
            'BackEnd.menu_items.subcategory_wise',
            compact('subcategory')
        );
    }


    public function create()
    {
        $title              = "Menu Item Entry";
        $getDietary         = Dietary::GetDietary();
        $getAllergy         = Allergy::GetAllergy();
        $getSpicelevel      = Spicelevel::GetSpicelevel();
        $getMealCourse      = MealCourse::GetMealCourse();
        $getSubcategory     = Subcategory::GetSubcategory();
        $getCondiments      = CondimentsGroup::GetCondimentsGroup();
        $getIngredientWith  = IngredientGroup::where('fld_with', 1)->where('fld_status', 'a')->get();
        $getIngredientWithout = IngredientGroup::where('fld_without', 1)->where('fld_status', 'a')->get();
        $getIngredientExtras = IngredientGroup::where('fld_extras', 1)->where('fld_status', 'a')->get();
        $getPreparation     = PreparationGroup::GetPreparationGroup();

        return view(
            'BackEnd.menu_items.create',
            compact(
                'title',
                'getSubcategory',
                'getAllergy',
                'getDietary',
                'getMealCourse',
                'getCondiments',
                'getSpicelevel',
                'getIngredientWith',
                'getIngredientWithout',
                'getIngredientExtras',
                'getPreparation'
            )
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            try {
                DB::beginTransaction();

                $Menuitems = new Menuitems;
                $Menuitems->fld_name            = $request->fld_name;
                $Menuitems->fld_price           = $request->fld_price;
                $Menuitems->fld_subcategory_id  = $request->fld_subcategory_id;
                $Menuitems->fld_description     = $request->fld_description;
                $Menuitems->fld_serial_numbr    = $request->fld_serial_numbr;
                $Menuitems->fld_spice_level     = $request->fld_spice_level;
                $Menuitems->fld_meal_course     = $request->fld_meal_course;
                $Menuitems->save();

                // Dietary One To Many Relationship===========
                if (!empty($request->fld_dietary)) :
                    foreach ($request->fld_dietary as $dietaryID) :
                        $dietary = Dietary::find($dietaryID);
                        $Menuitems->dietaries()->attach($dietary);
                    endforeach;
                endif;

                // Condiments Group One To Many Relationship==========
                if (!empty($request->fld_condiments)) :
                    foreach ($request->fld_condiments as $condimentsID) :
                        $condiments = CondimentsGroup::find($condimentsID);
                        $Menuitems->condiments_group()->attach($condiments);
                    endforeach;
                endif;

                // Preparation Group One To Many Relationship==========
                if (!empty($request->fld_preparations)) :
                    foreach ($request->fld_preparations as $preparationsID) :
                        $preparations = PreparationGroup::find($preparationsID);
                        $Menuitems->preparation_group()->attach($preparations);
                    endforeach;
                endif;

                // Ingredients Group One To Many Relationship==========
                if (!empty($request->fld_ingredient)) :
                    $fldIngredients = array_unique($request->fld_ingredient);
                    foreach ($fldIngredients as $ingredientsID) :
                        $ingredients = IngredientGroup::find($ingredientsID);
                        $Menuitems->ingredient_group()->attach($ingredients);
                    endforeach;
                endif;

                // Allergy One To Many Relationship==========
                if (!empty($request->fld_allergy)) :
                    foreach ($request->fld_allergy as $allergyID) :
                        $allergy = Allergy::find($allergyID);
                        $Menuitems->allergies()->attach($allergy);
                    endforeach;
                endif;

                $image = Input::file('fld_image');
                if (!empty($image)) :
                    $fpath      = 'upload_file/menu_items/';
                    $fileName   = $this->UploadFile($image, $fpath);
                    $img        = Menuitems::find($Menuitems->id);
                    $img->update(['fld_image' => $fileName]);
                endif;

                DB::commit();
                $this->after_process_message(true, "Save");
            } catch (Exception $ex) {
                DB::rollBack();
                $this->after_process_message(false, "Save");
            }
        endif;
    }

    public function show($id)
    {
        $data = Menuitems::find($id);
        return view('BackEnd.menu_items.show', compact('data'));
    }

    public function edit($id)
    {
        $title              = "Menu Item Update";
        $editData           = Menuitems::find($id);;
        $getDietary         = Dietary::GetDietary();
        $getAllergy         = Allergy::GetAllergy();
        $getSpicelevel      = Spicelevel::GetSpicelevel();
        $getMealCourse      = MealCourse::GetMealCourse();
        $getSubcategory     = Subcategory::GetSubcategory();
        $getCondiments      = CondimentsGroup::GetCondimentsGroup();
        $getIngredientWith  = IngredientGroup::where('fld_with', 1)->where('fld_status', 'a')->get();
        $getIngredientWithout = IngredientGroup::where('fld_without', 1)->where('fld_status', 'a')->get();
        $getIngredientExtras = IngredientGroup::where('fld_extras', 1)->where('fld_status', 'a')->get();
        $getPreparation     = PreparationGroup::GetPreparationGroup();

        return view(
            'BackEnd.menu_items.edit',
            compact(
                'title',
                'editData',
                'getSubcategory',
                'getAllergy',
                'getDietary',
                'getMealCourse',
                'getCondiments',
                'getSpicelevel',
                'getIngredientWith',
                'getIngredientWithout',
                'getIngredientExtras',
                'getPreparation'
            )
        );
    }

    //remove Dietary==================
    public function removeDietaryMI($id, $mid)
    {
        $info       = Menuitems::find($mid);
        $dietary    = Dietary::find($id);
        $res        = $info->dietaries()->detach($dietary);
        $this->after_process_message($res, "Remove");
    }

    //remove Condiments Group==================
    public function removeCondimentMI($id, $mid)
    {
        $info   = Menuitems::find($mid);
        $condi  = CondimentsGroup::find($id);
        $res    = $info->condiments_group()->detach($condi);
        $this->after_process_message($res, "Remove");
    }

    //remove Preparation Group==================
    public function removePreparationMI($id, $mid)
    {
        $info   = Menuitems::find($mid);
        $pre    = PreparationGroup::find($id);
        $res    = $info->preparation_group()->detach($pre);
        $this->after_process_message($res, "Remove");
    }

    //remove Ingredient Group==================
    public function removeIngredientMI($id, $mid)
    {
        $info   = Menuitems::find($mid);
        $Ingred = IngredientGroup::find($id);
        $res    = $info->ingredient_group()->detach($Ingred);
        $this->after_process_message($res, "Remove");
    }

    //remove Allergy==================
    public function removeAllergyMI($id, $mid)
    {
        $info       = Menuitems::find($mid);
        $allergy    = Allergy::find($id);
        $res        = $info->allergies()->detach($allergy);
        $this->after_process_message($res, "Remove");
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $info = Menuitems::find($id);

            // Dietary One To Many Relationship===========
            if (!empty($request->fld_dietary)) :
                foreach ($request->fld_dietary as $dietaryID) :
                    $dietary = Dietary::find($dietaryID);
                    $info->dietaries()->attach($dietary);
                endforeach;
            endif;

            // Condiments Group One To Many Relationship==========
            if (!empty($request->fld_condiments)) :
                foreach ($request->fld_condiments as $condimentsID) :
                    $condiments = CondimentsGroup::find($condimentsID);
                    $info->condiments_group()->attach($condiments);
                endforeach;
            endif;

            // Preparation Group One To Many Relationship==========
            if (!empty($request->fld_preparations)) :
                foreach ($request->fld_preparations as $preparationsID) :
                    $preparations = PreparationGroup::find($preparationsID);
                    $info->preparation_group()->attach($preparations);
                endforeach;
            endif;

            // Ingredients Group One To Many Relationship==========
            if (!empty($request->fld_ingredient)) :
                $fldIngredients = array_unique($request->fld_ingredient);
                foreach ($fldIngredients as $ingredientsID) :
                    $ingredients = IngredientGroup::find($ingredientsID);
                    $info->ingredient_group()->attach($ingredients);
                endforeach;
            endif;

            // Allergy One To Many Relationship==========
            if (!empty($request->fld_allergy)) :
                foreach ($request->fld_allergy as $allergyID) :
                    $allergy = Allergy::find($allergyID);
                    $info->allergies()->attach($allergy);
                endforeach;
            endif;

            $request->offsetUnset('fld_dietary');
            $request->offsetUnset('fld_condiments');
            $request->offsetUnset('fld_preparations');
            $request->offsetUnset('fld_ingredient');
            $request->offsetUnset('fld_allergy');
            $info->update($request->all());

            $image = Input::file('image');
            $oldImage = $request->fld_image;
            $fpath = 'upload_file/menu_items/';

            if (!empty($image)) {
                $fileName = $this->UploadFile($image, $fpath);
                $info->update(['fld_image' => $fileName]);
                if (!empty($oldImage)) : unlink($fpath . $oldImage);
                endif;
            }

            DB::commit();
            return redirect('menuitems')
                ->with('success', 'Update Successfully!!');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect('menuitems')
                ->with('errorMsg', 'Update Unsuccessfully!!');
        }
    }


    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Menuitems::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }


    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name' => 'required',
            'fld_subcategory_id' => 'required',
            'fld_price' => 'required',
            //            'fld_serial_numbr'  => 'unique:menuitems'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required' => 'Menuitems is required',
            'fld_price.required' => 'Price is required',
            'fld_subcategory_id.required' => 'Sub-category is required',
            //            'fld_serial_numbr.required' => 'Serial Number Image is required',
            //            'fld_serial_numbr.unique'   => 'This serial is already exist'
        ];
    }
}
