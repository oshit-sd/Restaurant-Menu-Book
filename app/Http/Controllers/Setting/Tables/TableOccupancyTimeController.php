<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting\Tables;

use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tables\TableOccupancyTime;

class TableOccupancyTimeController extends Controller
{
    use Utility;

    public function create()
    {
        $title  = "Table Occupancy Time";
        $data   = TableOccupancyTime::first();
        $count  = TableOccupancyTime::count();

        return view(
            'BackEnd.table_info.table_occupancy_time.create',
            compact('title', 'data', 'count')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = TableOccupancyTime::create($request->all());

            $this->after_process_message($res, "Save");
        endif;
    }

    public function update(Request $request, $id)
    {
        if ($this->validationCheck($request)) :
            $info = TableOccupancyTime::find($id);
            $res = $info->update($request->all());

            $this->after_process_message($res, "Update");
        endif;
    }


    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_time' => 'required'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_time.required' => 'Time is required',
        ];
    }
}
