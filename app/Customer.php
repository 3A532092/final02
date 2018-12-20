<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Customer extends Model
{
    //
    protected $table = 'customers';
    public function user(){
        return $this->belongs(User::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
