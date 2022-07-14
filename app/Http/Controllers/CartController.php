<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Show your cart:
    public function index(){
        return view('homepage.cart');
    }

    //Add product in cart:
    public function create(CartHelper $cart,$id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $product = Product::find($id);
        $cart->create($product,$quantity);
        return redirect()->back();
    }




}
