<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting\Tables;

use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Model\Tables\TableSection;
use App\Http\Controllers\Controller;

class TableSectionController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('tableSection/create');
    }

    public function create()
    {
        $title      = "Table Section";
        $getData    = TableSection::GetTableSection();

        return view(
            'BackEnd.table_info.table_section.create',
            compact('title', 'getData')
        );
    }

    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = TableSection::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(TableSection $tableSection)
    {
        return redirect('tableSection/create');
    }


    public function edit(TableSection $tableSection)
    {
        $editData = $tableSection;
        return view('BackEnd.table_info.table_section.edit', compact('editData'));
    }


    public function update(Request $request, TableSection $tableSection)
    {
        if ($this->validationCheck($request)) :
            $res = $tableSection->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }


    public function destroy($id)
    {
        $res = TableSection::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }

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
            'fld_name.required' => 'Section Name is required'
        ];
    }
}
