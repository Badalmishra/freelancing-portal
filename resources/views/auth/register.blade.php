@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/certain.css">
<div class="row m-0 p-0">
    <div class="card x regfrm ">
        <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body pb-3 pt-2">
                    <form method="POST" action="{{ route('register') }}" id="form">
                        @csrf
                                <div class="form-group ">
                                    <label for="name" class="text-white">{{ __('Name') }}</label>

                                    <div class="">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-sm" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="email" class="text-white">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-sm" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="paypal" class="text-white">Paypal Account</label>

                                    <div class="">
                                        <input id="paypal" type="text" class="form-control{{ $errors->has('paypal') ? ' is-invalid' : '' }} form-control-sm" name="paypal" required>

                                        @if ($errors->has('paypal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('paypal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="password" class="text-white">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-sm" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="password-confirm" class="text-white">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                                    </div>
                                </div>
                            
                                <div class="form-group ">
                                    <label for="type" class="text-white">User Type</label>
                                    <select name="type" class="form-control form-control-sm">
                                        <option value="client">Client</option>
                                        <option value="freelancer">Freelancer</option>
                                    </select>
                                    @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                    @endif
                                </div>
        
                                
                            
                        
                         <div class="">      
                            <button type="submit" class="btn btn-primary w-100 ">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="row m-0 col-12 p-0">
            <div class="col bg-warning des"></div>
            <div class="col bg-primary des"></div>
        </div>
        <div class="row m-0 col-12 p-0">
            <div class="col bg-success des"></div>
            <div class="col bg-info des"></div>
        </div>
</div>     
@endsection
