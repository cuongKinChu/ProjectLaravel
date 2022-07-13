<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $product = Product::limit(10)->orderby('id','DESC')->get();
        return view('homepage.index',['data'=>$product]);
    }

}
