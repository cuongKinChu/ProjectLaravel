<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected CartHelper $cartHelper;

    public function __construct(CartHelper $cartHelper)
    {
        $this->cartHelper = $cartHelper;
    }

    //Add product in cart:
    public function create($id)
    {
        $cart = new CartHelper();
        $quantity = request()->quantity ? request()->quantity : 1;
        $product = Product::find($id);
        $cart->create($product, $quantity);
        return redirect()->back();
    }

    //Delete from cart
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        Session::flash('success', 'Delete product successful');
        return redirect()->back();
    }

    //Update cart
    public function update(CartHelper $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        if ($quantity < 1) {
            Session::flash('error', 'Update cart unsuccessful');
            return redirect()->route('admin.cart.index');
        }
        $cart->update($id, $quantity);
        Session::flash('success', 'Update cart successful');
        return redirect()->back();
    }
}
