<?php

namespace App\Http\Controllers\HomePage;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartServices;

    /**
     * @param $cartServices
     */
    public function __construct(CartService $cartServices)
    {
        $this->cartServices = $cartServices;
    }

    //Show your cart:
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
        if($quantity < 1)
        {
            Session::flash('error','Update cart unsuccessful');
            return redirect()->route('cart.index');
        }
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
