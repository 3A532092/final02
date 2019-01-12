<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Graphiccard;

use Auth;

class AdminGraphicController extends Controller
{
    //
    public function index(){
        $type=Auth::user()->type;
        if($type == true){        
            $graphics=Graphiccard::orderBy('id','ASC')->get();
            $data=['graphiccard'=>$graphics];
            return view('admin.graphic.index',$data);
        }
        else{
            return redirect('/');
        }
    }

    public function create(){
        return view('admin.graphic.create');
    }

    public function edit($id){
        $graphics=Graphiccard::find($id);
        $data = ['graphiccard' => $graphics];

        return view('admin.graphic.edit', $data);

    }

    public function store(Request $request){
        Graphiccard::create($request->all());
        return redirect()->route('admin.graphic.index');
    }

    public function update(Request $request,$id){
        $graphics=Graphiccard::find($id);
        $graphics->update($request->all());
        return redirect()->route('admin.graphic.index');
    }

    public function destroy($id){
        Graphiccard::destroy($id);
        return redirect()->route('admin.graphic.index');
    }
}
