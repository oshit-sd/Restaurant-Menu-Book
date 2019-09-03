<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Preparation;

use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Preparation\Preparation;

class PreparationController extends Controller
{
    use Utility;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('preparation/create');
    }


    public function create()
    {
        $title   = "Preparation";
        $count   = Preparation::where('fld_status', 'a')->count();
        $getData = Preparation::GetPreparation();

        return view(
            'BackEnd.preparation.create',
            compact('title', 'getData', 'count')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Preparation::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }

    public function show(Preparation $preparation)
    {
        return redirect('preparation/create');
    }


    public function edit(Preparation $preparation)
    {
        $editData = $preparation;
        return view('BackEnd.Preparation.edit', compact('editData'));
    }


    public function update(Request $request, Preparation $preparation)
    {
        if ($this->validationCheck($request)) :
            $res = $preparation->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }


    public function destroy($id)
    {
        $res = Preparation::where('id', $id)->update(['fld_status' => 'd']);
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
            'fld_name.required' => 'Preparation Name is required'
        ];
    }
}
