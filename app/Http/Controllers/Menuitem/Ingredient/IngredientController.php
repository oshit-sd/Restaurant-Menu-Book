<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Ingredient;

use App\Traits\Utility;
use App\Model\Ingredient\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('ingredient/create');
    }

    public function create()
    {
        $title = "Ingredient Entry";
        $getData = Ingredient::GetIngredient();

        return view(
            'BackEnd.ingredient.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Ingredient::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Ingredient $ingredient)
    {
        return redirect('ingredient/create');
    }

    public function edit(Ingredient $ingredient)
    {
        $editData = $ingredient;
        return view('BackEnd.ingredient.edit', compact('editData'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        if ($this->validationCheck($request)) :
            $res = $ingredient->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $res = Ingredient::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required' => 'Ingredient Name is required'
        ];
    }
}
