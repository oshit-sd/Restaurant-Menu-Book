<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers\Setting;

use App\Model\Service;
use App\Traits\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('service/create');
    }

    public function create()
    {
        $title = 'Service Entry';
        $getData = Service::GetService();

        return view(
            'Backend.service.create',
            compact('title', 'getData')
        );
    }

    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $res = Service::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }

    public function show(Service $service)
    {
        return redirect('service/create');
    }

    public function edit(Service $service)
    {
        $editData = $service;
        return view('BackEnd.service.edit', compact('editData'));
    }

    public function update(Request $request, Service $service)
    {
        if ($this->validationCheck($request)) :
            $res = $service->update($request->all());
            $this->after_process_message($res, "Update");
        endif;
    }

    public function destroy($id)
    {
        $res = Service::where('id', $id)->update(['fld_status' => 'd']);
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
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
            'fld_name.required' => 'Service Name is required'
        ];
    }
}
