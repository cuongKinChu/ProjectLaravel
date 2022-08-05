<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    //Retrieve orders from date ... to date ...
    public function getListOrderByDate($date_from, $date_to)
    {
        return $this->model->whereBetween('created_at', [$date_from, $date_to])
            ->get();
    }

    //Get the order with the product name
    public function searchOrderHaveProductName($key)
    {
        return $this->model->whereHas('orderDetails.product',
            function ($query) use ($key) {
                $query->where('product_name', 'like', '%' . $key . '%');
            })->with('orderDetails')->get();
    }
}
