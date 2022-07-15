<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    protected $cart;

    /**
     * @param $cart
     */
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }


    public function index(){
        return view('admin.cart.customer',[
           'title' => 'List order',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.cart.detail',[
           'title' => 'Order detail: ' . $customer->full_name,
            'customer' => $customer,
            'carts' => $customer->carts()->with('product')->get(),
        ]);
    }

    public function destroy($id)
    {
        $this->cart->destroyCustomer($id);
        return redirect()->route('customers.index');
    }
}
