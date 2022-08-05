<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderProcessed;
use App\Http\Controllers\Controller;
use App\Services\CheckoutService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderListController extends Controller
{
    private $orderService;
    private $customerService;
    private $productService;
    private $checkoutServices;

    public function __construct(
        OrderService $orderService,
        CustomerService $customerService,
        ProductService $productService,
        CheckoutService $checkoutServices
    ) {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
        $this->productService = $productService;
        $this->checkoutServices = $checkoutServices;
    }

    public function index()
    {
        $orders = $this->orderService->getListOrderByDate(request()->date_from,
            request()->date_to);
        return view('admin.order.listorder', ['orders' => $orders]);
    }

    //Search order have product name
    public function searchOrder(Request $request)
    {
        $key = $request->search;
        $orders = $this->orderService->searchOrderHaveProductName($key);

        return view('admin.order.listorder', ['orders' => $orders]);
    }

    public function create()
    {
        $customers = $this->customerService->getAllCustomer();
        $products = $this->productService->getAllProduct();
        return view('admin.order.add',
            ['customers' => $customers, 'products' => $products]);
    }

    //Checkout
    public function store(Request $request)
    {
        $this->checkoutServices->checkout($request);

        event(new OrderProcessed($request->input('customer')));
        return redirect()->back();
    }

    public function edit($id)
    {
        $order = $this->orderService->findById($id);
        return view('admin.order.edit', ['order' => $order]);
    }

    public function update($id, Request $request)
    {
        try {
            $this->orderService->updateStatus($id, $request);

            Session::flash('success', 'Update order success');
            return redirect()->route('admin.order.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->orderService->deleteOrder($id);

            Session::flash('success', 'Delete order success');
            return redirect()->route('admin.order.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
}
