@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cs_name" class="col-md-4 col-form-label text-md-right">{{ __('姓名') }}</label>

                            <div class="col-md-6">
                                <input id="cs_name" type="text" class="form-control{{ $errors->has('cs_name') ? ' is-invalid' : '' }}" name="cs_name" value="{{ old('cs_name') }}" required autofocus>

                                @if ($errors->has('cs_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cs_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cs_telephone" class="col-md-4 col-form-label text-md-right">{{ __('電話') }}</label>

                            <div class="col-md-6">
                                <input id="cs_telephone" type="text" class="form-control{{ $errors->has('cs_telephone') ? ' is-invalid' : '' }}" name="cs_telephone" value="{{ old('cs_telephone') }}" required autofocus>

                                @if ($errors->has('cs_telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cs_telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cs_address" class="col-md-4 col-form-label text-md-right">{{ __('地址') }}</label>

                            <div class="col-md-6">
                                <input id="cs_address" type="text" class="form-control{{ $errors->has('cs_address') ? ' is-invalid' : '' }}" name="cs_address" value="{{ old('cs_address') }}" required autofocus>

                                @if ($errors->has('cs_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cs_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
