<?php

namespace App\Http\Controllers\HomePage;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        return view('homepage.checkout');
    }

    public function checkout(Request $request, CartHelper $cartService)
    {
        try {
            $customer_id = session('customer')->customer_id;
            if ($order = Order::create([
                'customer_id' => $customer_id,
                'full_name' => $request->full_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'order_note' => $request->order_note,
            ])) {
                $order_id = $order->id;
                $this->addOrderDetail($order_id, $cartService);
            };
            Session::flash('success', 'Order success');
            return redirect()->back();
        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return redirect()->back();
        }
    }

    private function addOrderDetail($order_id, CartHelper $cartService)
    {
        foreach ($cartService->items as $product_id => $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
        session()->forget('cart');
    }
}
