<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Graphiccard;
use App\Order;
use App\OrderDetail;
use App\Cart;
use DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request){
        $user=Auth::user()->id;
        $gcid=$request->input('gc_id');
        $qy=$request->input('quantity');
        $price=Graphiccard::where('id',$gcid)->value('price');
        DB::insert('insert into carts (cs_id, gc_id, price, qy) values (?, ?, ?, ?)', [$user, $gcid, $price, $qy]);
        return redirect('/index');
    }

    public function index(Request $request){
        $user=Auth::user()->id;
        $cart = Cart::join('graphiccard','carts.gc_id','=','graphiccard.id')
        ->where('cs_id', $user)
        ->select('carts.id','carts.cs_id','graphiccard.gc_name','carts.price','carts.qy')
        ->orderBy('id','ASC')
        ->get();
        $data=['carts' => $cart];
        $sum=0;
        foreach($cart as $tt){
            $sum=$sum + ($tt->price*$tt->qy);
        }
        $data2=['ss'=>$sum];
        return view('cart.index', $data,$data2);
    }

    public function destroy($id){
        Cart::destroy($id);
        return redirect()->route('cart.index');
    }

    public function update($id,$quantity)
    {
        DB::table('carts')
            ->where('id', $id)
            ->update(['qy' => $quantity]);
        return redirect()->route('cart.index');
    }
}
