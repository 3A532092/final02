<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Graphiccard;

class AdminGraphicController extends Controller
{
    //
    public function index(){
        $graphics=Graphiccard::orderBy('gc_id','ASC')->get();
        $data=['graphiccard'=>$graphics];
        return view('admin.graphic.index',$data);
    }

    public function create(){
        return view('admin.graphic.create');
    }

    public function edit($gc_id){
        $graphics=Graphiccard::find($gc_id);
        $data = ['graphiccard' => $graphics];

        return view('admin.graphic.edit', $data);

    }

    public function store(Request $request){
        Graphiccard::create($request->all());
        return redirect()->route('admin.graphic.index');
    }

    public function update(Request $request,$gc_id){
        $graphics=Graphiccard::find($gc_id);
        $graphics->update($request->all());
        return redirect()->route('admin.graphic.index');
    }

    public function destroy($gc_id){
        Graphiccard::destroy($gc_id);
        return redirect()->route('admin.graphic.index');
    }
}
