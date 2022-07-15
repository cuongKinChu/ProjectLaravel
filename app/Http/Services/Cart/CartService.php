<?php

namespace App\Http\Services\Cart;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        //
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();

    }

    //Thêm vào session cart
    public function create($product, $quantity = 1)
    {
        $item = [
            'id' => $product->id,
            'product_name' => $product->product_name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }

    //Cập nhật giỏ hàng
    public function update($id, $quantity = 1)
    {
        //
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }

    public function remove($id)
    {
        //
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function clear()
    {
        //
        session(['cart' => '']);
    }

    private function get_total_price()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
        //
    }

    private function get_total_quantity()
    {
        //
        $total_q = 0;
        foreach ($this->items as $item) {
            $total_q += $item['quantity'];
        }
        return $total_q;
    }

    public function addCart($request)
    {

        try {
            $carts = Session::get('cart');
            if (is_null($carts)) {
                return false;
            }

            $customer = Customer::create([
                'full_name' => $request->input('full_name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);

            $this->infoProductCart($carts, $customer->id);
            Session::flash('success','Order successful');
        } catch (\Exception $err) {
            Session::flash('error','Order error');
            return false;
        }
    }

    protected function infoProductCart($carts,$customer_id)
    {

        $data = [];
        foreach($carts as $id=>$item){
            $quantity = $item['quantity'];
            $price = $item['price'];
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $id,
                'qty' => $quantity,
                'price' => $price,
            ];
        }
        $this->clear();
        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderBy('id','DESC')->paginate(5);
    }

    public function destroyCustomer($id)
    {
        try {
            $customer = Customer::find($id);
            if ($customer)
            {
                Cart::where('customer_id',$customer->id)->delete();
                Customer::where('id',$id)->delete();
            }
            Session::flash('success','Delete successful');
        } catch (\Exception $err) {
            Session::flash('error','Delete error');
            return false;
        }
    }
}