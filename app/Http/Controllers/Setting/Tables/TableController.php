<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting\Tables;

use App\Traits\Utility;
use App\Model\Tables\Table;
use Illuminate\Http\Request;
use App\Model\Tables\TableSection;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('table/create');
    }


    public function create()
    {
        $title          = "Table Entry";
        $getData        = Table::GetTables();
        $getSectionData = TableSection::GetTableSection();

        return view(
            'BackEnd.table_info.table.create',
            compact('title', 'getData', 'getSectionData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Table::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(Table $table)
    {
        return redirect('table/create');
    }

    public function edit(Table $table)
    {
        $editData = $table;
        $getSectionData = TableSection::GetTableSection();

        return view('BackEnd.table_info.table.edit', compact('editData', 'getSectionData'));
    }

    public function update(Request $request, $id)
    {
        if ($this->validationCheck($request)) :
            $info = Table::find($id);
            $data = $request->all();
            $res = $info->update($data);
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $res = Table::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'fld_name'          => 'required',
            'fld_section_id'    => 'required',
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'fld_name.required'         => 'Table Name is required',
            'fld_section_id.required'   => 'Section Name is required',
        ];
    }
}
