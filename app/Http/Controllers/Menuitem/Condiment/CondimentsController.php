<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Condiment;

use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Model\Condiment\Condiments;
use App\Http\Controllers\Controller;

class CondimentsController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('condiments/create');
    }


    public function create()
    {
        $title = "Condiments Entry";
        $getData = Condiments::GetCondiments();

        return view(
            'BackEnd.condiments.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Condiments::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Condiments $Condiments)
    {
        return redirect('condiments/create');
    }

    public function edit($id)
    {
        $editData = Condiments::find($id);
        return view('BackEnd.condiments.edit', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        if ($this->validationCheck($request)) :
            $info = Condiments::find($id);
            $data = $request->all();
            $res = $info->update($data);
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Condiments::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_condiment_name' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_condiment_name.required' => 'Condiment Name is required'
        ];
    }
}
