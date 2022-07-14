<?php

namespace App\Helper;

class CartHelper
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        //
        $this->items = session('cart') ?  session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    //Add products to session cart
    public function create($product,$quantity = 1)
    {
        $item =[
            'id' => $product->id,
            'product_name' => $product -> name,
            'price' => $product -> price,
            'image' => $product->image,
            'quantity' => $quantity
        ];
        //If the product has been added before, the quantity will be increased
        if(isset($this->items[$product->id])){
            $this->items[$product->id]['quantity'] += $quantity;
        }else {
            $this->items[$product->id] = $item;
        }
        session(['cart'=>$this->items]);
    }

    private function get_total_price()
    {
        $total_price = 0;
        foreach($this->items as $item){
            $total_price += $item['price']*$item['quantity'];
        }
        return $total_price;
        //
    }

    private function get_total_quantity()
    {
        //
        $total_quantity = 0;
        foreach($this->items as $item){
            $total_quantity += $item['quantity'];
        }
        return $total_quantity;
    }
}

