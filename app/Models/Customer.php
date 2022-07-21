<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';
    protected $fillable = ['customer_id','full_name','email','password','address','phone'];

    public function carts()
    {
        return $this->hasMany(Cart::class,'customer_id','id');
    }
    protected $hidden = [
        'password', 'remember_token',
    ];


}
