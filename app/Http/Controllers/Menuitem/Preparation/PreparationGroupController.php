<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem\Preparation;

use DB;
use Exception;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Preparation\Preparation;
use App\Model\Preparation\PreparationGroup;

class PreparationGroupController extends Controller
{
    use Utility;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('preparationGroup/create');
    }


    public function create()
    {
        $title          = "Preparation Group";
        $getPreparation = Preparation::GetPreparation();
        $getData        = PreparationGroup::GetPreparationGroup();

        return view(
            'BackEnd.preparation.create_group',
            compact('title', 'getData', 'getPreparation')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            try {
                DB::beginTransaction();
                $preparationGroup = new PreparationGroup;
                $preparationGroup->fld_name = $request->fld_name;

                $res = $preparationGroup->save();

                foreach ($request->fld_preparation_id as $id) {
                    $res2 = $preparation = Preparation::find($id);
                    $preparationGroup->preparation()->attach($preparation);
                }

                if ($res2) {
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


    public function show(PreparationGroup $preparationGroup)
    {
        return redirect('preparationGroup/create');
    }


    public function edit(PreparationGroup $preparationGroup)
    {
        $getPreparation = Preparation::GetPreparation();
        $editData       = $preparationGroup;

        return view('BackEnd.preparation.edit_group', compact('getPreparation', 'editData'));
    }

    public function removePreparation($pid, $pgid)
    {
        $info = PreparationGroup::find($pgid);
        $pndm = Preparation::find($pid);
        $res = $info->preparation()->detach($pndm);
        $this->after_process_message($res, "Remove");
    }


    public function update(Request $request, PreparationGroup $preparationGroup)
    {
        // dd($preparationGroup);
        if (!empty($request->old_preparation) == 1 || !empty($request->fld_preparation_id)) :
            try {
                DB::beginTransaction();

                if (!empty($request->fld_preparation_id)) :
                    foreach ($request->fld_preparation_id as $id) :
                        $res = $preparation = Preparation::find($id);
                        $preparationGroup->preparation()->attach($preparation);
                    endforeach;
                endif;

                $res2 = $preparationGroup->update(['fld_name' => $request->fld_name]);

                if ($res2 && is_null($request->fld_preparation_id) || $res) {
                    DB::commit();
                } else {
                    DB::rollBack();
                }

                return redirect('preparationGroup/create')
                    ->with('success', 'Update Successfully!!');
            } catch (Exception $ex) {
                DB::rollBack();

                return redirect('preparationGroup/create')
                    ->with('errorMsg', 'Update Unsuccessfully!!');
            } else :
            return redirect('preparationGroup/' . $preparationGroup->id . '/edit')
                ->with('errorMsg', 'Please select minimum 1 preparation');

        endif;
    }


    public function destroy($id)
    {
        $res = PreparationGroup::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }


    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name' => 'required',
            'fld_preparation_id' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required' => 'Preparation Group Name is required',
            'fld_preparation_id.required' => 'Preparation Name is required'
        ];
    }
}
