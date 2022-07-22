<?php

namespace App\Services\Customer;

use App\Models\Order;
use App\Models\OrderDetail;


class OrderServices
{
    public function getOrderOfCustomer($customer_id)
    {
        return Order::where('customer_id', $customer_id)->get();
    }

    public function getListOrder()
    {
        return Order::orderby('id', 'DESC')->get();
    }

    public function getListOrderByDate($date_from,$date_to)
    {
        return Order::whereBetween('created_at',[$date_from,$date_to])->get();
    }


}