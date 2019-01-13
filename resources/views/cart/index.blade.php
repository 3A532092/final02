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
                <form action="{{ route('shop.checkout') }}" method="post" accept-charset="UTF-8">

                    @csrf

                    <ul class="list-group mb-3">
                        @foreach($carts as $ct)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-7">
                                <h6 class="my-0">{{ $ct->gc_name }}</h6>
                                <input type="hidden" name="id" value="{{ $ct->id }}">
                            </div>
                            <div class="col-2">
                                <select name="quantity" class="form-control form-control-sm" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
                                <option value="{{$ct -> qy}}">{{$ct -> qy}}</option>
                                    @foreach(range(1, 10) as $quantity)
                                    <option value="{{route('cart.update',['id'=>$ct->id,'quantity'=>$quantity])}}">{{$quantity}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <span class="text-muted">$ {{ $ct->price }}</span>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('cart.destroy', $ct->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    
                                    <button class="btn btn-secondary">刪除</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                        <div class="text-right">
                        <span class="text-muted">總金額: $ {{ $ss }}</span>
                        <button type="submit" class="btn btn-secondary">結帳</button>
                    </div>
                    </ul>
                    
                </form>
            </div>
        </div>
    </div>
@endsection