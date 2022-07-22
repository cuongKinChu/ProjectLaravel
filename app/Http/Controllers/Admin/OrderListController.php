<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\Customer\CustomerServices;
use App\Services\Customer\OrderServices;

class OrderListController extends Controller
{
    private $orderServices;

    /**
     * @param $customerServices
     */
    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    public function index()
    {
        $orders = $this->orderServices->getListOrder();
        if (request()->date_from && request()->date_to )
        {
            $orders = $this->orderServices->getListOrderByDate(request()->date_from , request()->date_to);
        }
        return view('admin.cart.listorder', ['title' => 'List order', 'orders' => $orders]);
    }

    public function getOrderDetailByOrderId($id)
    {
        $orders = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $id)->with('product')->get();
        return view('admin.cart.orderdetail',
            ['title' => 'Order detail', 'orderdetailbyId' => $orderDetail, 'orderbyId' => $orders]);
    }

    public function showOrderOfCustomer($customer_id)
    {
        $orders = $this->orderServices->getOrderOfCustomer($customer_id);
        return view('admin.cart.ordercus', ['title' => 'List Order of Customer', 'orders' => $orders]);
    }


}
