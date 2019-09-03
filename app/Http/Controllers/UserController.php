<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Traits\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    use Utility;

    public function index()
    {
        return redirect('UserEntry/create');
    }


    public function create()
    {
        $title = "User Entry";
        $getData = User::GetUser();

        return view(
            'BackEnd.user.create',
            compact('title', 'getData')
        );
    }


    public function store(Request $request)
    {
        if ($this->validationCheck($request)) :
            $pass = $request->password;
            $hPass = Hash::make($pass);
            $request->offsetSet('password', $hPass);

            $res = User::create($request->all());
            $this->after_process_message($res, "Save");
        endif;
    }


    public function show(User $user)
    {
        return redirect('UserEntry/create');
    }

    public function edit($id)
    {
        $editData = User::find($id);
        return view('BackEnd.user.edit', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $info = User::find($id);

        if (!empty(Input::post('password'))) :
            $pass = $request->password;
            $hPass = Hash::make($pass);
            $request->offsetSet('password', $hPass);
            $data = $request->all();
        else :
            $data = ['name' => $request->name];
        endif;

        $res = $info->update($data);
        $this->after_process_message($res, "Update");
    }

    public function destroy($id)
    {
        $res = User::where('id', $id)->delete();
        $this->after_process_message($res, "Delete");
    }

    // Validation Rules=======
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:4|required_with:Confirm_Password|same:Confirm_Password',
            'Confirm_Password' => 'min:4:'
        ];
    }

    // Validation Message=======
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'username.required' => 'User Name is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 4 characters.',
            'Confirm_Password.min' => 'Confirm Password must be at least 4 characters.',
            'Confirm_Password.required' => 'Confirm Password is required.',
            'fld_password.same' => 'Password and confirm password must match.',
        ];
    }
}
