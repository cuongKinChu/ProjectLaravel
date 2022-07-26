<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customerService;

    /**
     * @param $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customer = $this->customerService->getAllCustomer();
        return view('admin.customer.list', ['customers' => $customer]);
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('admin.customer.add');
    }

    //Store a newly created resource in storage.
    public function store(CustomerRequest $request)
    {
        try {
            $this->customerService->insert($request);

            Session::flash('success', 'Add customer success');
            return redirect()->route('admin.customer.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->route('admin.customer.store');
        }
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $customer = $this->customerService->findById($id);
        return view('admin.customer.edit', [
            'data' => $customer,
        ]);
    }

    //Update the specified resource in storage.
    public function update(CustomerRequest $request, $id)
    {
        try {
            $this->customerService->updateById($request, $id);

            Session::flash('success', 'Update customer successful');
            return redirect()->route('admin.customer.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $this->customerService->deleteById($id);

            Session::flash('success', 'Delete customer successful');
            return redirect()->route('admin.customer.index');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
}
