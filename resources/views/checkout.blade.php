@extends('cart.master')

@section('title', '結帳')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>結帳</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-12 mb-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">帳單明細</span>
                </h4>
                    <ul class="list-group mb-3">
                        @foreach($orderdetails as $de)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-6">
                                <h6 class="my-0">{{ $de->gc_name }}</h6>
                            </div>
                            <div class="col-2">
                                <span class="text-muted">單價 $ {{ $de->price }}</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted">{{ $de -> de_qy }}</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted">總額 $ {{ $de->sum }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-right">
                        <span class="text-muted">總金額: $ {{ $orders->total }}</span>
                        <button href="{{ action('OrderController@index') }}" class="btn btn-secondary">查看訂單</button>
                    </div>
            </div>
        </div>
    </div>
@endsection