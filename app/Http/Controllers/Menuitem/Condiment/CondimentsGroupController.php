<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Condiment;

use DB;
use Exception;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Model\Condiment\Condiments;
use App\Http\Controllers\Controller;
use App\Model\Condiment\CondimentsGroup;

class CondimentsGroupController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('condimentsGroup/create');
    }

    public function create()
    {
        $title          = "Condiments Group Entry";
        $getCondiments  = Condiments::GetCondiments();
        $getData        = CondimentsGroup::GetCondimentsGroup();

        return view(
            'BackEnd.condiments.create_group',
            compact('title', 'getData', 'getCondiments')
        );
    }

    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            try {
                DB::beginTransaction();

                $condiGroup = new CondimentsGroup;
                $condiGroup->fld_name = $request->fld_name;
                $res = $condiGroup->save();

                foreach ($request->fld_condiments_id as $id) :
                    $res2 = $condiment = Condiments::find($id);
                    $condiGroup->condiments()->attach($condiment);
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

    public function show(CondimentsGroup $condimentsGroup)
    {
        return redirect('condimentsGroup/create');
    }

    public function edit(CondimentsGroup $condimentsGroup)
    {
        $title          = "Condiments Group Update";
        $getCondiments  = Condiments::GetCondiments();
        $editData       = $condimentsGroup;
        return view('BackEnd.condiments.edit_group', compact('editData', 'getCondiments', 'title'));
    }


    public function removeCondiment($cid, $cgid)
    {
        $info = CondimentsGroup::find($cgid);
        $cndm = Condiments::find($cid);
        $res = $info->condiments()->detach($cndm);
        $this->after_process_message($res, "Remove");
    }

    public function update(Request $request, CondimentsGroup $condimentsGroup)
    {
        if (!empty($request->old_condiment) == 1 || !empty($request->fld_condiments_id)) :
            try {
                DB::beginTransaction();

                if (!empty($request->fld_condiments_id)) :
                    foreach ($request->fld_condiments_id as $id) :
                        $res = $condiment = Condiments::find($id);
                        $condimentsGroup->condiments()->attach($condiment);
                    endforeach;
                endif;

                $res2 = $condimentsGroup->update(['fld_name' => $request->fld_name]);

                if ($res2 && is_null($request->fld_preparation_id) || $res) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }

                return redirect('condimentsGroup/create')
                    ->with('success', 'Update Successfully!!');
            } catch (Exception $ex) {
                DB::rollBack();

                return redirect('condimentsGroup/create')
                    ->with('errorMsg', 'Update Unsuccessfully!!');
            } else :
            return redirect('condimentsGroup/' . $condimentsGroup->id . '/edit')
                ->with('errorMsg', 'Please select minimum 1 Condiment');
        endif;
    }

    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = CondimentsGroup::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    protected function rules()
    {
        return [
            'fld_name'          => 'required',
            'fld_condiments_id' => 'required'
        ];
    }

    // Validation Message=======
    protected function messages()
    {
        return [
            'fld_name.required'             => 'Condiment Group Name is required',
            'fld_condiments_id.required'    => 'Condiment Name is required'
        ];
    }
}
