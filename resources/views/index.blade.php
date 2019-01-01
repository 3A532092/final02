@extends('layouts.master')

@section('title','Search Page')

    <!-- Navigation -->
@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">顯卡列表
        <small></small>
      </h1>
      <div class="card-body">
        <form method="POST" action="{{ route('index.show') }}">
          @csrf
            
            <div class="form-group row">
              <label for="search" class="col-md-4 col-form-label text-md-right">{{('輸入關鍵字')}}</label>

            <div class="col-md-6">
              <input id="searchword" type="string" class="form-control" name="searchword" value="" required autofocus>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{('搜尋')}}
                </button>
              </div>
            </div>
          </div>
      </div>

      <div class="row">
      @foreach($graphiccard as $graphic)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">{{$graphic->gc_name}}</a>
              </h4>
              <p class="card-text">價格：{{$graphic->price}}元</p>
              <p class="card-text">{{$graphic->chipset}} 架構</p>
              <p class="card-text">功耗：{{$graphic->gcp}}</p>
              <p class="card-text">DX11：{{$graphic->dx11f}}分</p>
              <p class="card-text">DX12：{{$graphic->dx12t}}分</p>
              <p class="card-text">尺寸：{{$graphic->size}}</p>
            </div>
          </div>
        </div>
      @endforeach
　　　</div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection