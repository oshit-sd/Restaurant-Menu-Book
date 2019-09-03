<?php

namespace App\Http\Controllers\Auth;

use App\Menuitems;
use App\User;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    // login Page===========
    public function showLoginForm()
    {
        if (!empty(session()->get('UserInfo'))) :
            return redirect('/home');
        else :
            return view('auth.login');
        endif;
    }

    //    Login User data check
    public function loginUser(Request $request)
    {
        $v = Validator::make($request->all(), [
            'username' => 'required|min:2',
            'password' => 'required|min:4'
        ]);
        if ($v->fails()) {
            return redirect('/login')
                ->with('errorMsg', 'Sorry!! Wrong Information');
        } else {
            $checkInfo = User::where('username', $request->username)
                ->where('status', 'a')->first();
            if ($checkInfo) {
                if (Hash::check($request->password, $checkInfo->password)) {

                    $data = [
                        'name' => $checkInfo->name,
                        'username' => $checkInfo->username,
                        'userID' => $checkInfo->id
                    ];
                    //                    $request->session()->put('UserInfo', $data) ;
                    //                    dd(session()->get('UserInfo'));
                    //                    die();
                    //                    session()->get('UserInfo');
                    return redirect('/home')->with('UserInfo', $data);
                } else {
                    return redirect('/')
                        ->with('errorMsg', 'Sorry!! wrong Information');
                }
            } else {
                return redirect('/')
                    ->with('errorMsg', 'Sorry!! wrong Information');
            }
        }
    }
}
