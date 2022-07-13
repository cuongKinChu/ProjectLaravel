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

    public static function saveCustomer($full_name,$email,$password,$address)
    {
        $customer = new Customer();
        $customer->full_name = $full_name;
        $customer->email = $email;
        $customer->password = bcrypt($password);
        $customer->address = $address;
        $customer->save();
    }
}
