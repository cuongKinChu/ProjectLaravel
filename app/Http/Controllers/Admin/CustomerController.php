<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderby('id', 'DESC')->paginate(5);
        return view('admin.customer.list', [
            'data' => $customer,
            'title' => 'List account customers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add', [
            'title' => 'Add new customer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required|email:filter|unique:customers,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required'
        ]);
        Customer::saveCustomer($data['full_name'],$data['email'], $data['password'],$data['address']);
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer= Customer::find($id);
        return view('admin.customer.edit', [
            'data' => $customer,
            'title' => 'Edit customer'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $data = $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required|email:filter',
            'address' => 'required'
        ]);
        Customer::updateCustomer($id,$data['full_name'],$data['email'],$data['address']);
        Session::flash('success', 'Update customer successful');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Customer::find($id)){
            Customer::find($id)->delete();
            Session::flash('success', 'Delete customer successful');
            return redirect()->back();
        }
        else{
            Session::flash('error', 'Delete customer error');
            return redirect()->route('customer.index');
        }
    }
}
