<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerServices;
use App\Services\Customer\OrderServices;

class CustomerController extends Controller
{
    private $customerServices;
    private $orderServices;

    /**
     * @param $customerServices
     */
    public function __construct(CustomerServices $customerServices, OrderServices $orderServices)
    {
        $this->customerServices = $customerServices;
        $this->orderServices = $orderServices;
    }

    public function index()
    {
        $customer = $this->customerServices->getAllCustomer();
        return view('admin.cart.customer', ['title' => 'List Customer', 'customers' => $customer]);
    }
}
