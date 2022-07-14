<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    //Xóa khỏi giỏ hàng
    public function remove(CartHelper $cart,$id){
        $cart->remove($id);
        Session::flash('success','Delete product successful');
        return redirect()->back();
    }

    //Cập nhật giỏ hàng
    public function update(CartHelper $cart,$id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id,$quantity);
        Session::flash('success','Update cart successful');
        return redirect()->back();
    }

    public function clear(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }

}
