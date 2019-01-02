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

     
}
