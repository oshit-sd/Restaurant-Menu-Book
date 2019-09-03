<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function ShowLoginForm()
    {
        return view('auth.admin-login');
    }

    public function Adminlogin(Request $request)
    {
        // $v = $this->validate($request, [
        //     'email'     => 'required|email|min:10',
        //     'password'  => 'required|min:6',
        //     'user_name' => 'required|min:5',
        // ]);

        $v = Validator::make($request->all(), [
            'username' => 'required|min:2',
            'password' => 'required|min:5'
        ]);
        if ($v->fails()) {
            return redirect('/Login/Admin')
                ->with('errorMsg', 'Sorry!! Your Login Information is Wrong');
        } else {
            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 'a'], $request->remember)) {
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Login Successfully');
            } else {
                return redirect('/Login/Admin')
                    ->with('errorMsg', 'Sorry!! Your Login Information is Wrong');
            }
        }
    }


    protected $redirectTo = '/admin.dashboard';
}
