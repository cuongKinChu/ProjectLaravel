<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutService
{
    private $orderServices;
    private $customerService;

    public function __construct(
        OrderService $orderServices,
        CustomerService $customerService
    ) {
        $this->orderServices = $orderServices;
        $this->customerService = $customerService;
    }

    //Check out order
    public function checkout(Request $request)
    {
        try {
            $request->except('_token');
            $customer_id = $this->customerService->findById($request->customer);

            $array = [
                'customer_id' => $customer_id->id,
                'order_note' => $request->order_note,
            ];
            #If the order is successfully created, the order details will be created
            if ($order = $this->orderServices->createOrder($array)) {
                $order_id = $order->id;
                $this->addOrderDetail($order_id,$cart = session('cart'));
            }
            session()->forget('cart');
            Session::flash('success', 'Order success');
            return true;
        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return false;
        }
    }

    private function addOrderDetail($order_id,$cart)
    {

        foreach ($cart as $product_id => $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];
            $array = [
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $price,
            ];
            $this->orderServices->createOrderDetail($array);
        }
    }
}
