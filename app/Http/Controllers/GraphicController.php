<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Graphiccard;

class GraphicController extends Controller
{
    //
    public function getindex(){
        $graphics=Graphiccard::get();
        $data=['graphiccard'=>$graphics];
        return view('index',$data);

        if($searchword != null) {
            $data = $searchword->input('searchword');
            return view('index',$data);
        }
    }

    public function search(Request $request){
        $searchword=$request->input('searchword');

        //顯卡搜尋 變數要雙引號包住
        $graphics=Graphiccard::where('gc_name','like',"%$searchword%")
        ->orWhere('price','<=',$searchword)
        ->get();
        
        
        
        $data=['graphiccard'=>$graphics];
        return view('index',$data);
        
    }
}
