<?php

namespace App\Repositories\Eloquent;

use App\Models\OrderDetail;
use App\Repositories\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    public function __construct(OrderDetail $orderDetail)
    {
        parent::__construct($orderDetail);
    }

    //Delete
    public function deleteByOrderId($orderId)
    {
        return $this->model->newModelQuery()->where('order_id', $orderId)->delete();
    }
}
