<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //Login screen
    public function index()
    {
        return view('admin.login',[
            'title'=>'Login to system'
        ]);
    }

    //Logout
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    //
    public  function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt([
            'email'=> $request ->input('email'),
            'password'=> $request ->input('password')
            ], $request->input('remember'))) {
            return redirect()->route('dashboard');
        }
        Session::flash('error','Email or Password is wrong');
        return redirect()->back();
    }
}
