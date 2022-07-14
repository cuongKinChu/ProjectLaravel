<?php

namespace App\Http\Services\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerAdminServices
{
    //Insert customer
    public function insert($request)
    {
        try {
            $request->except('_token');
            Customer::create([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'address' => $request->input('address'),
            ]);
            Session::flash('success', 'Add customer successful');
        }catch (\Exception $err){
            Session::flash('error', 'Add customer fail');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    //Update customer
    public function update($request,$id)
    {
        try {
            $request->except('_token');

            $customer = Customer::find($id);

            $customer->full_name = $request->full_name;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->save();
            Session::flash('success', 'Update customer successful');
        }catch (\Exception $err){
            Session::flash('error', 'Update customer fail');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    //Remove customer
    public function remove($id)
    {
        $customer = Customer::find($id);
        if ($customer){
            $customer->delete();
            return Session::flash('success', 'Delete customer successful');
        }
        else{
            return Session::flash('error', 'Delete customer error');
        }
    }
}