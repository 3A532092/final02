<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Graphiccard;
use App\Order;
use App\OrderDetail;
use App\Cart;
use Auth;
use DB;

class DetailController extends Controller
{
    //
    public function getindex($id){
        $detail=Orderdetail::join('graphiccard','orderdetails.gc_id','=','graphiccard.gc_id')
            ->join('orders','orderdetails.od_id','=','orders.id')
            ->where('od_id',$id)
            ->select('orderdetails.id','orderdetails.de_qy','graphiccard.gc_name','graphiccard.price','orderdetails.gc_id','orders.od_st','orderdetails.sum','orderdetails.od_id')
            ->orderBy('id','ASC')
            ->get();
        $data = ['orderdetails' => $detail];
        $total=Order::find($id);
        return view('order.detail.index', $data,['orders'=>$total]);
    }

    public function update($id,$deid,$quantity)
    {
        $price=Orderdetail::join('graphiccard','orderdetails.gc_id','=','graphiccard.gc_id')
            ->where('orderdetails.id',$deid)
            ->select('graphiccard.price')
            ->get();
        $data = ['orderdetails' => $price];
        $sum=0;
        foreach($price as $pp){
            $sum=($quantity * $pp->price);
        }
        DB::table('orderdetails')
            ->where('id', $deid)
            ->update(['sum' => $sum, 'de_qy' => $quantity]);

        $tal=Orderdetail::where('od_id',$id)->get();
        $data2 = ['orderdetails' => $tal];
        $plus=0;
        foreach($tal as $ts){
            $plus=$plus+$ts->sum;
        }

        DB::table('orders')
            ->where('id', $id)
            ->update(['total' => $plus]);
        return redirect()->route('detail.index', $id);
    }

    public function destroy($id,$deid)
    {
        DB::table('orderdetails')
            ->where('id', $deid)
            ->delete();
        $odsum=DB::table('orderdetails')
            ->where('od_id', $id)
            ->get();
        $data=['orderdetails' => $odsum];
        $total=0;
        foreach($odsum as $tt){
            $total=$total + $tt->sum;
        }
        DB::table('orders')
            ->where('id', $id)
            ->update(['total' => $total]);
        return redirect()->route('detail.index', $id);
    }
}
