@extends('cart.master')

@section('title', '訂單明細')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>訂單明細</h2>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-12 mb-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">明細列表</span>
                </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-7">
                              <span class="text-muted"> 顯卡名稱</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted"> 單價</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted"> 數量</span>
                            </div>
                            <div class="col-2">
                                <span class="text-muted"> 總額</span>
                            </div>
                        </li>
                      @foreach($orderdetails as $de)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-7">
                                <h6 class="my-0">{{$de -> gc_name}}</h6>
                                <input type="hidden" name="id" value="{{$de -> id}}">
                            </div>
                            <div class="col-2">
                                <span class="text-muted">$ {{$de -> price}}</span>
                            </div>
                            @if($de -> od_st == 0)
                            <div class="col-2">
                                <select name="quantity" class="form-control form-control-sm" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
                                <option value="{{$de -> de_qy}}">{{$de -> de_qy}}</option>
                                    @foreach(range(1, 10) as $quantity)
                                    <option value="{{route('detail.update',['id'=>$de->od_id,'deid'=>$de->id,'quantity'=>$quantity])}}">{{$quantity}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @elseif($de -> od_st == 1)
                            <div class="col-2">
                                <span class="text-muted">{{ $de -> de_qy }}</span>
                            </div>
                            @endif
                            <div class="col-2">
                                <span class="text-muted">$ {{$de -> sum}}</span>
                            </div>
                            @if($de -> od_st == 0)
                            <div class="col-2">
                                <form action="{{ route('detail.destroy',['id'=>$de -> od_id,'deid'=>$de -> id] ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    
                                    <button class="btn btn-secondary">刪除</button>
                                </form>
                            </div>
                            @endif
                            
                        </li>
                        @endforeach
                        <div class="text-right">
                        <span class="text-muted">總金額: $ {{$orders -> total}}</span>
                        <button value="{{ action('OrderController@index') }}" onclick="location.href='{{ action('OrderController@index') }}'" class="btn btn-secondary">返回訂單列表</button>
                    </div>
                  </ul>
            </div>
        </div>
    </div>
@endsection