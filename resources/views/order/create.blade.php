@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('訂單') }}</div>

                <div class="card-body">
                    <form method="POST" action="/orders">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('姓名') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="cs_name" readonly="readonly" value="{{$users->cs_name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('電話') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="cs_telephone" readonly="readonly" value="{{$users->cs_telephone}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="email" readonly="readonly" value="{{$users->email}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('地址') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="cs_address" readonly="readonly" value="{{$users->cs_address}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('顯卡') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="gc_name" value="{{$graphiccard->gc_name}}" required autofocus>
                                <input class="form-control" type="hidden" name="gc_id" value="{{$graphiccard->gc_id}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('價錢') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="price" readonly="readonly" value="{{$graphiccard->price}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('數量') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" name="gc_qy">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input class="form-control" type="hidden" name="id" value="{{$users->id}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('結帳') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
