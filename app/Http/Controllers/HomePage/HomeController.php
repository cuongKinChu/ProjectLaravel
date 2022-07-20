<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
        $product = Product::limit(10)->orderby('id','DESC')->get();
        return view('homepage.index',['data'=>$product]);
    }

}
