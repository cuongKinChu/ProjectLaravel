<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //Main system screen
    public function index()
    {
        return view('admin.dashboard',[
            'title'=>'Dash Board'
        ]);
    }
}
