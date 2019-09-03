<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting\Tables;

use App\Traits\Utility;
use App\Model\Tables\ColorPicker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ColorPickerController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('ColorPicker/create');
    }

    public function create()
    {
        $title      = "Table Status Entry";
        $Vacant     = ColorPicker::where('table_status', 'va')->first();
        $Reserved   = ColorPicker::where('table_status', 'rs')->first();
        $Occupied   = ColorPicker::where('table_status', 'oc')->first();
        $Open       = ColorPicker::where('table_status', 'op')->first();
        $AskBill    = ColorPicker::where('table_status', 'ab')->first();
        $Closed     = ColorPicker::where('table_status', 'cl')->first();

        return view(
            'BackEnd.table_info.table_status.create',
            compact('title', 'Vacant', 'Reserved', 'Occupied', 'Open', 'AskBill', 'Closed')
        );
    }


    public function store($status)
    {
        $color = Input::get('color');
        $count = ColorPicker::where('table_status', $status)->count();

        if ($count == 0) :
            $data   = ['table_status' => $status, 'color_code' => $color];
            $res    = ColorPicker::create($data);
            $this->after_process_message($res, "Save");

        else :
            $data   = ['color_code' => $color];
            $res    = ColorPicker::where('table_status', $status)->update($data);
            $this->after_process_message($res, "Update");
        endif;
    }
}
