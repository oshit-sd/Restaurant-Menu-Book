<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting;

use App\Traits\Utility;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Model\RestaurantSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RestaurantSettingController extends Controller
{
    use Utility;
    use ImageUpload;

    public function create()
    {
        $title  = "Restaurant Setting";
        $data   = RestaurantSetting::first();
        $count  = RestaurantSetting::count();

        return view(
            'BackEnd.restaurant_setting.create',
            compact('title', 'data', 'count')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = RestaurantSetting::create($request->all());

            $image = Input::file('fld_logo');
            $fpath = 'upload_file/logo/';
            $fileName = $this->UploadFile($image, $fpath);

            $img = RestaurantSetting::find($res->id);
            $img->update(['fld_logo' => $fileName]);

            return redirect('RestaurantSetting/create')
                ->with('success', 'Save Successfully!!');
        endif;
    }

    public function update(Request $request, $id)
    {
        $info = RestaurantSetting::find($id);
        $res = $info->update($request->all());

        $image = Input::file('fld_logo');
        $oldImage = $request->old;
        $fpath = 'upload_file/logo/';

        if (!empty($image)) {
            $fileName = $this->UploadFile($image, $fpath);
            $info->update(['fld_logo' => $fileName]);
            if (isset($image)) :
                if (!empty($oldImage)) : unlink($fpath . $oldImage);
                endif;
            endif;
        }
        return redirect('RestaurantSetting/create')
            ->with('success', 'Update Successfully!!');
    }


    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name' => 'required',
            'fld_logo' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required' => 'Restaurant Name is required',
            'fld_logo.required' => 'Logo is required'
        ];
    }
}
