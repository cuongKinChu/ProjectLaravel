<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Login screen
        public function index()
        {
            return view('admin.login',[
                'title'=>'Login to system'
            ]);
        }

}
