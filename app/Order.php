<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Customer;

class Order extends Model
{
    //
    protected $table = 'orders';

    public function customer(){
        return $this->belongs(Customer::class);
    }

    public function orderdetail(){
        return $this->hasOne(OrderDetail::class);
    }

    
}
