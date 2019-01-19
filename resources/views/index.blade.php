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
        <form method="POST" action='/graphic/search'>
          {{csrf_field()}}
            
            <div class="form-group row">
              <label>
                關鍵字查詢
                <input name='searchword' type='string'>
              </label>
              <br>
                <input type='submit'>

            </div>
          </form>
      </div>

      <div class="row">
      @foreach($graphiccard as $graphic)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">
                {{$graphic->gc_name}}
              </h4>
              <p class="card-text">價格：{{$graphic->price}}元</p>
              <p class="card-text">{{$graphic->chipset}} 架構</p>
              <p class="card-text">功耗：{{$graphic->gcp}}</p>
              <p class="card-text">DX11：{{$graphic->dx11f}}分</p>
              <p class="card-text">DX12：{{$graphic->dx12t}}分</p>
              <p class="card-text">尺寸：{{$graphic->size}}</p>
              <form method="POST" action="/cart">
                @csrf
                <div class="form-group row mb-0">
                  <p class="card-text">數量</p>
                  <input class="form-control" type="hidden" name="gc_id" value="{{$graphic->id}}">
                  <select name="quantity" class="form-control">
                    @foreach(range(1, 10) as $quantity)
                      <option value={{$quantity}}>{{$quantity}}</option>
                    @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary">
                    {{ __('加入購物車') }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endforeach
　　　</div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection