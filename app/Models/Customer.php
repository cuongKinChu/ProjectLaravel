<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';
    protected $fillable = ['customer_id', 'full_name', 'email', 'password', 'address', 'phone'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }


}
