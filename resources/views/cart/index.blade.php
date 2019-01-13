@extends('cart.master')

@section('title', '購物車')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>購物車</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-12 mb-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">待購清單</span>
                </h4>
                <form action="#" method="post" accept-charset="UTF-8">

                    @csrf

                    <ul class="list-group mb-3">
                        @foreach($carts as $ct)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-9">
                                <h6 class="my-0">{{ $ct->gc_name }}</h6>
                                <input type="hidden" name="gcid" value="{{ $ct->gc_id }}">
                            </div>
                            <div class="col-2">
                                <select name="quantity" class="form-control form-control-sm">
                                <option value="{{$ct -> qy}}">{{$ct -> qy}}</option>
                                    @foreach(range(1, 10) as $quantity)
                                    <option value={{$quantity}}>{{$quantity}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1">
                                <span class="text-muted">$ {{ $ct->price }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-right">
                        <button type="submit" class="btn btn-secondary">結帳</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection