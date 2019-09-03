<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    public function index()
    {
        $title = "Dashboard";
        return view('BackEnd.dashboard.dashboard')->with([
            'title' => $title,
        ]);
    }


    public function create()
    {
        $title = "Create User";
        $roles = Role::get();
        $getAdmin = Admin::Get_admin_list();
        return view('BackEnd.createAdmin.create_admin')->with([
            'getAdminList' => $getAdmin,
            'title' => $title,
            'getRoles' => $roles
        ]);
    }


    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'roles' => 'required',
            'username' => 'required|min:2|unique:admins',
            'password' => 'min:5|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'min:5'
        ]);
        if ($v->fails()) {
            $data['validation'] = $v->errors();
            echo json_encode($data);
        } else {
            $pass = $request->password;
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->password = Hash::make($pass);
            $admin->add_by = $request->add_by;
            $res = $admin->save();

            // Role Assign
            $role_r = Role::where('id', $request->roles)->firstOrFail();
            $admin->assignRole($role_r); //Assigning role to user

            $Check = Admin::where('id', '!=', auth()->user()->id)->get();

            // Exection after meg
            $this->after_process_message($res, "Save");

        }
    }

    public function show($id)
    {
        return redirect('/admin');
    }

    public function edit($id)
    {
        $editData = Admin::find($id);
        $getRoles = Role::get();


        return view('BackEnd.createAdmin.edit_admin',
            compact('editData', 'getRoles'));
    }

    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'team_id' => 'required',
        ]);
        if ($v->fails()) {
            $data['validation'] = $v->errors();
            echo json_encode($data);
        } else {
            $info = Admin::find($id);
            $input = $request->only(['name', 'team_id']);
            $roles = $request['roles']; //Retreive all roles
            $res = $info->fill($input)->save();

            if (isset($roles)) {
                $info->roles()->sync($roles);  //If one or more role is selected associate user to roles
            } else {
                $info->roles()->detach(); //If no role is selected remove exisiting role associated to a user
            }

            $this->after_process_message($res, "Update");
        }
    }

    public function destroy($id)
    {
        $data = ['status' => 'd'];
        $res = Admin::where('id', $id)->update($data);
        $this->after_process_message($res, "Delete");
    }


    public function user_change_password_page($id)
    {
        $pass = Admin::find($id);
        return view('BackEnd.createAdmin.userPasswordChange')->with(['pass' => $pass]);
    }

    public function user_password_change(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'password' => 'min:6|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'min:6',
        ]);
        if ($v->fails()) {
            $data['validation'] = "Password do not match!! try again..";
            echo json_encode($data);
        } else {
            $password = Hash::make($request->password);
            Admin::where('id', $id)
                ->update(['password' => $password]);
            $data['success'] = "Password change successfully!!";
            echo json_encode($data);
        }
    }


    public function change_password_page($id)
    {
        $pass = Admin::find($id);
        return view('BackEnd.createAdmin.changePassword')->with(['pass' => $pass]);
    }

    public function old_password_check(Request $request, $id)
    {
        if (Auth::guard('admin')->attempt(['password' => $request->old_password, 'id' => $id])) {
            $data['suc'] = "Success";
            echo json_encode($data);
        } else {
            $data['err'] = "Error";
            echo json_encode($data);
        }
    }


    public function password_change(Request $request, $id)
    {

        if (Auth::guard('admin')->attempt(['password' => $request->old_password, 'id' => $id])) {
            $v = Validator::make($request->all(), [
                'password' => 'min:6|required_with:repeat_password|same:repeat_password',
                'repeat_password' => 'min:6',
            ]);
            if ($v->fails()) {
                $data['validation'] = "Password do not match!! try again..";
                echo json_encode($data);
            } else {
                $password = Hash::make($request->password);
                Admin::where('id', $id)
                    ->update(['password' => $password]);
                $data['success'] = "Password change successfully!!";
                echo json_encode($data);
            }
        } else {
            $data['err'] = "Error";
            echo json_encode($data);
        }
    }


    public function __construct()
    {
        $this->middleware(['auth:admin', 'UserRolePermission']);
    }


}
