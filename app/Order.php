<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Order extends Model
{
    //
    protected $table = 'orders';

    public function User(){
        return $this->belongs(User::class);
    }

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }

    
}
