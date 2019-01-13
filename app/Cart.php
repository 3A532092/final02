<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Cart extends Model
{
    //
    protected $table = 'carts';

    protected $fillable=[
        'cs_id','gc_name','qy','price',
    ];

    public function User(){
        return $this->belongs(User::class);
    }

    public function graphiccard(){
        return $this->hasOne(Graphiccard::class);
    }
}
