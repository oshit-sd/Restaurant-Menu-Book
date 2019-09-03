<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Menuitem;

use App\Model\Dietary;
use App\Traits\Utility;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DietaryController extends Controller
{
    use Utility;
    use ImageUpload;

    public function index()
    {
        return redirect('DietaryEntry/create');
    }


    public function create()
    {
        $title = "Dietary Entry";
        $getData = Dietary::GetDietary();

        return view(
            'BackEnd.dietary.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Dietary::create($request->all());

            $image = Input::file('fld_image');
            $fpath = 'upload_file/dieatary/';
            $fileName = $this->UploadFile($image, $fpath);

            $img = Dietary::find($res->id);
            $img->update(['fld_icon_image' => $fileName]);
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Dietary $dietary)
    {
        return redirect('dietary/create');
    }

    public function edit(Dietary $dietary)
    {
        $editData = $dietary;
        return view('BackEnd.dietary.edit', compact('editData'));
    }

    public function update(Request $request, Dietary $dietary)
    {
        $res = $dietary->update($request->all());

        $image = Input::file('image');
        $oldImage = $request->fld_image;
        $fpath = 'upload_file/dieatary/';

        if (!empty($image)) {
            $fileName = $this->UploadFile($image, $fpath);
            $dietary->update(['fld_icon_image' => $fileName]);
            if (!empty($oldImage)) : unlink($fpath . $oldImage);
            endif;
        }
        return redirect('dietary/create')
            ->with('success', 'Update Successfully!!');
    }


    public function destroy($id)
    {
        $data = ['fld_status' => 'd'];
        $res = Dietary::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }


    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name' => 'required',
            'fld_image' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required' => 'Dietary is required',
            'fld_image.required' => 'Icon / Image is required'
        ];
    }
}
