<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\OrderDetail;

class Graphiccard extends Model
{
    //
    protected $table = 'graphiccard';

    public function orderdetail(){
        return $this->belongs(OrderDetail::class);
    }

    
}
