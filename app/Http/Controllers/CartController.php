<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Http\Services\Cart\CartService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartServices;

    //Show your cart:

    /**
     * @param $cartServices
     */
    public function __construct(CartService $cartServices)
    {
        $this->cartServices = $cartServices;
    }

    public function index(){
        return view('homepage.cart');
    }

    //Add product in cart:
    public function create(CartService $cart,$id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $product = Product::find($id);

        $cart->create($product,$quantity);
        return redirect()->route('cart.index');
    }

    //Delete from cart
    public function remove(CartService $cart,$id){
        $cart->remove($id);
        Session::flash('success','Delete product successful');
        return redirect()->back();
    }

    //Update cart
    public function update(CartService $cart,$id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id,$quantity);
        Session::flash('success','Update cart successful');
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $this->cartServices->addCart($request);
        return redirect()->back();
    }

}
