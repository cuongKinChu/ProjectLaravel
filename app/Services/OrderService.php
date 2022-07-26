<?php

namespace App\Services;

use App\Repositories\OrderDetailRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private OrderRepositoryInterface $orderRepository;
    private OrderDetailRepositoryInterface $orderDetailRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    //Create order
    public function createOrder($request)
    {
        return $this->orderRepository->create($request);
    }

    //Create order details
    public function createOrderDetail($request)
    {
        return $this->orderDetailRepository->create($request);
    }

    //Find order by id
    public function findById($id)
    {
        return $this->orderRepository->findById($id);
    }

    //Update order status
    public function updateStatus($id, $request)
    {
        try {
            $array = ['status' => $request->status];
            $this->orderRepository->update($id, $array);
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    //Delete order
    public function deleteOrder($id)
    {
        DB::beginTransaction();
        try {
            $order = $this->findById($id);
            // First is to delete the order details
            foreach ($order->orderDetails as $order_detail) {
                $this->orderDetailRepository->deleteByOrderId($order_detail->order_id);
            }
            // Then delete the order
            $this->orderRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw new \Exception($ex->getMessage());
        }
    }

    //Get order list
    public function getListOrder()
    {
        return $this->orderRepository->getAll(['orderDetails']);
    }

    //Get list of orders by date
    public function getListOrderByDate($date_from, $date_to)
    {
        if ($date_from == null && $date_to == null) {
            return $this->orderRepository->getAll(['orderDetails']);
        }
        return $this->orderRepository->getListOrderByDate($date_from, $date_to);
    }

    //Get a list of orders containing product names
    public function searchOrderHaveProductName($key)
    {
        return $this->orderRepository->searchOrderHaveProductName($key);
    }
}
