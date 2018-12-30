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
      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ ('搜尋') }}</label>

          <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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