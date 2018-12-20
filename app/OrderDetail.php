<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order;

class OrderDetail extends Model
{
    //
    protected $table = 'orderdetails';

    public function order(){
        return $this->belongs(Order::class);
    }

    public function graphiccard(){
        return $this->hasMany(Graphiccard::class);
    }
}
