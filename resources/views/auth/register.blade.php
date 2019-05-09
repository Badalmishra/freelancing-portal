@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row ">
                            <div class="col-md-6 py-4 pr-0 mr-0">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-8">
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

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paypal" class="col-md-4 col-form-label text-md-right">Paypal Account</label>

                                    <div class="col-md-8">
                                        <input id="paypal" type="text" class="form-control{{ $errors->has('paypal') ? ' is-invalid' : '' }}" name="paypal" required>

                                        @if ($errors->has('paypal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('paypal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-8">
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

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5 py-4">
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">User Type</label>
                                    <select name="type" class="form-control col-md-8">
                                        <option value="client">Client</option>
                                        <option value="freelancer">Freelancer</option>
                                    </select>
                                    @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                    @endif
                                </div>
        
                                <div class="form-group row">
                                    <label for="resume" class="col-md-4 col-form-label text-md-right">Resume</label>
                                    <input type="text" name="resume" class="form-control col-md-8">
                                    @if ($errors->has('resume'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('resume') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="portfolio" class="col-md-4 col-form-label text-md-right">portfolio</label>
                                    <input type="text" name="portfolio" class="form-control col-md-8">
                                    @if ($errors->has('portfolio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('portfolio') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="facebook" class="col-md-4 col-form-label text-md-right">facebook</label>
                                    <input type="text" name="facebook" class="form-control col-md-8">
                                    @if ($errors->has('facebook'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="twitter" class="col-md-4 col-form-label text-md-right">twitter</label>
                                    <input type="text" name="twitter" class="form-control col-md-8">
                                    @if ($errors->has('twitter'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('twitter') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="px-4">      
                        <button type="submit" class="btn btn-primary w-100 mx-auto">
                            {{ __('Register') }}
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
