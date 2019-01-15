@extends('cart.master')

@section('title', '訂單')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>訂單</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-12 mb-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">訂單列表</span>
                </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-4">
                              <span class="text-muted"> 訂單編號</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted"> 訂單狀態</span>
                            </div>
                            <div class="col-4">
                                <span class="text-muted"> 訂單總額</span>
                            </div>
                        </li>
                        @foreach($orders as $od)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-5">
                                <h6 class="my-0">{{$od -> id}}</h6>
                            </div>
                            @if($od->od_st  == 0)
                            <div class="col-3">
                                <span class="text-muted"> 訂單接收中</span>
                            </div>
                            @elseif( $od->od_st  == 1)
                            <div class="col-3">
                                <span class="text-muted"> 訂單處理中</span>
                            </div>
                            @endif
                            <div class="col-2">
                                <span class="text-muted"> $ {{$od -> total}}</span>
                            </div>
                            <div class="col-2">
                              <button value="{{ route('detail.index', $od->id) }}" onclick="location.href='{{ route('detail.index', $od->id) }}'" class="btn btn-secondary">查看訂單內容</button>
                            </div>
                            @if( $od->od_st  == 0)
                            <div class="col-2">
                                <form action="{{ route('order.destroy', $od -> id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    
                                    <button class="btn btn-secondary">刪除</button>
                                </form>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
@endsection