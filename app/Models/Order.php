<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable = ['id','customer_id','full_name','address','phone','order_note','status'];
    use HasFactory;
}
