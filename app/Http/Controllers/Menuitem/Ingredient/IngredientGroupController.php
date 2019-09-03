<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Ingredient;

use DB;
use Exception;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Model\Ingredient\Ingredient;
use App\Http\Controllers\Controller;
use App\Model\Ingredient\IngredientGroup;

class IngredientGroupController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('IngredientGroup/create');
    }

    public function create()
    {
        $title          = "Ingredient Group Entry";
        $getIngredient  = Ingredient::GetIngredient();
        $getData        = IngredientGroup::GetIngredientGroup();

        return view(
            'BackEnd.ingredient.create_group',
            compact('title', 'getData', 'getIngredient')
        );
    }

    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            try {
                DB::beginTransaction();

                $ingredientGroup                = new IngredientGroup;
                $ingredientGroup->fld_name      = $request->fld_name;
                $ingredientGroup->fld_with      = $request->fld_with;
                $ingredientGroup->fld_without   = $request->fld_without;
                $ingredientGroup->fld_extras    = $request->fld_extras;
                $res = $ingredientGroup->save();

                foreach ($request->fld_ingredient_id as $id) :
                    $res2 = $ingredient = Ingredient::find($id);
                    $ingredientGroup->ingredient()->attach($ingredient);
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

    public function show(IngredientGroup $IngredientGroup)
    {
        return redirect('IngredientGroup/create');
    }

    public function edit(IngredientGroup $IngredientGroup)
    {
        $title          = "Ingredient Group Update";
        $getIngredient  = Ingredient::GetIngredient();
        $editData       = $IngredientGroup;

        return view('BackEnd.ingredient.edit_group', compact('editData', 'getIngredient', 'title'));
    }

    public function removeIngredient($iid, $igid)
    {
        $info = IngredientGroup::find($igid);
        $indm = Ingredient::find($iid);
        $res = $info->ingredient()->detach($indm);
        $this->after_process_message($res, "Remove");
    }

    public function update(Request $request, IngredientGroup $IngredientGroup)
    {
        if (!empty($request->old_ingredient) == 1 || !empty($request->fld_ingredient_id)) :

            try {
                DB::beginTransaction();

                if (!empty($request->fld_ingredient_id)) :
                    foreach ($request->fld_ingredient_id as $id) :
                        $res = $ingredient = Ingredient::find($id);
                        $IngredientGroup->ingredient()->attach($ingredient);
                    endforeach;
                endif;

                $data = [
                    'fld_name'      => $request->fld_name,
                    'fld_with'      => $request->fld_with,
                    'fld_without'   => $request->fld_without,
                    'fld_extras'    => $request->fld_extras
                ];
                $res2 = $IngredientGroup->update($data);

                if ($res2 && is_null($request->fld_preparation_id) || $res) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }
                return redirect('IngredientGroup/create')
                    ->with('success', 'Update Successfully!!');
            } catch (Exception $ex) {
                DB::rollBack();

                return redirect('IngredientGroup/create')
                    ->with('errorMsg', 'Update Unsuccessfully!!');
            } else :
            return redirect('IngredientGroup/' . $IngredientGroup->id . '/edit')
                ->with('errorMsg', 'Please select minimum 1 ingredient');
        endif;
    }

    public function destroy($id)
    {
        $res = IngredientGroup::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name'          => 'required',
            'fld_ingredient_id' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required'             => 'Ingredient Group Name is required',
            'fld_ingredient_id.required'    => 'Ingredient Name is required'
        ];
    }
}
