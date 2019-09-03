<?php
/*
    @Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem;

use App\Model\Allergy;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllergyController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('allergy/create');
    }


    public function create()
    {
        $title = "Allergy Entry";
        $getData = Allergy::GetAllergy();

        return view(
            'BackEnd.allergy.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Allergy::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Allergy $allergy)
    {
        return redirect('allergy/create');
    }

    public function edit(Allergy $allergy)
    {
        $editData = $allergy;
        return view('BackEnd.allergy.edit', compact('editData'));
    }

    public function update(Request $request, Allergy $allergy)
    {
        if ($this->validationCheck($request)) :
            $res = $allergy->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $res    = Allergy::where('id', $id)->update(['fld_status' => 'd']);
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
            'fld_name.required' => 'Allergy Name is required'
        ];
    }
}
