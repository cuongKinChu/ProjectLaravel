<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['full_name','email','address','phone','content'];

    public function carts()
    {
        return $this->hasMany(Cart::class,'customer_id','id');
    }



}
