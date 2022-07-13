<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['full_name','email','password','address'];
    public $timestamp = false;
    use HasFactory;

    //Create new customer
    public static function saveCustomer($full_name,$email,$password,$address)
    {
        $customer = new Customer();
        $customer->full_name = $full_name;
        $customer->email = $email;
        $customer->password = bcrypt($password);
        $customer->address = $address;
        $customer->save();
    }

    //Update customer
    public static function updateCustomer($id,$full_name,$email,$address)
    {
        $customer = Customer::find($id);
        $customer->full_name = $full_name;
        $customer->email = $email;
        $customer->address = $address;
        $customer->save();
    }
}
