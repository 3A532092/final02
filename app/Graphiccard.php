<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\OrderDetail;

use App\Cart;

class Graphiccard extends Model
{
    //
    protected $table = 'graphiccard';


    protected $fillable=[
        'gc_id','gc_name','constructor','price','chipset','size','gcp','6/8pin','dx11f','dx12t',
    ];

    public function orderdetail(){
        return $this->belongs(OrderDetail::class);
    }

    public function cart(){
        return $this->belongs(Cart::class);
    }

    
}
