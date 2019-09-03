<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem;

use App\Model\Spicelevel;
use App\Traits\Utility;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SpicelevelController extends Controller
{
    use Utility;
    use ImageUpload;

    public function index()
    {
        return redirect('spicelevel/create');
    }


    public function create()
    {
        $title = "Spice Level Entry";
        $getData = Spicelevel::GetSpicelevel();

        return view(
            'BackEnd.spice_level.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if (!empty($request->all())) :
            $res = Spicelevel::create($request->all());
            $img = Spicelevel::find($res->id);

            $ChiliIcon = Input::file('fld_chili_icon');
            $IconImage = Input::file('fld_icon_image');
            $fpath = 'upload_file/spice_level/';

            if (!empty($ChiliIcon)) :
                $fileName = $this->UploadFile($ChiliIcon, $fpath);
                $img->update(['fld_chili_icon' => $fileName]);
            endif;

            if (!empty($IconImage)) :
                $fileName = $this->UploadFile($IconImage, $fpath);
                $img->update(['fld_icon_image' => $fileName]);
            endif;


            $this->after_process_message($res, "Save");
        else :
            $this->after_process_message(false, "Store");
        endif;
    }


    public function show(Spicelevel $spicelevel)
    {
        return redirect('spicelevel/create');
    }

    public function edit(Spicelevel $spicelevel)
    {
        $editData = $spicelevel;
        return view('BackEnd.spice_level.edit', compact('editData'));
    }

    public function update(Request $request, Spicelevel $spicelevel)
    {
        $res = $spicelevel->update($request->all());

        $ChiliIcon = Input::file('chili_icon');
        $IconImage = Input::file('icon_image');
        $OldChiliIcon = $request->fld_chili_icon;
        $OldIconImage = $request->fld_icon_image;
        $fpath = 'upload_file/spice_level/';

        if (!empty($ChiliIcon)) :
            $fileName = $this->UploadFile($ChiliIcon, $fpath);
            $spicelevel->update(['fld_chili_icon' => $fileName]);
            if (!empty($OldChiliIcon)) : unlink($fpath . $OldChiliIcon);
            endif;
        endif;

        if (!empty($IconImage)) :
            $fileName = $this->UploadFile($IconImage, $fpath);
            $spicelevel->update(['fld_icon_image' => $fileName]);
            if (!empty($OldIconImage)) : unlink($fpath . $OldIconImage);
            endif;
        endif;

        return redirect('spicelevel/create')
            ->with('success', 'Update Successfully!!');
    }


    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Spicelevel::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }
}
