<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'customer_id', 'full_name', 'address', 'phone', 'order_note', 'status'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'customer_id');
    }

    public function order_detail()
    {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

    use HasFactory;
}
