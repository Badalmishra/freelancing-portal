@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/login.css">
<script src="https://unpkg.com/scrollreveal">
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<div class="bg-info py-5 " id="logo">
    <div class="container py-0">
        <div class="row ">
            <div class="col-md-8 animated fadeInDown" >
                <h1 class="text-success display-3 mt-5 " >
                    Kaam <span class="text-dark">Dhan</span>dha
                    
                </h1>
                <h3 class="">
                        No More Overheads
                </h3>
            </div>
            <div class="col-md-4">
            <div class="card animated fadeInUp" >
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                                <div class="mb-3">
                                    <input id="email" type="email" placeholder="E-mail" class="form-stuff form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <input id="password" placeholder="Password" type="password" class="form-stuff form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="form-check">
                                    <input class=" form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            

                                <div class="mt-3 animated fadeInRight">
                                    <button type="submit" class="form-stuff btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
                                    <button type="submit" class="form-stuff btn btn-danger w-100 mb-2">
                                        Google Login
                                    </button>
                                        
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                        </form>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>

<div class="p-4 p-md-5 text-center">
    <h1 class="punchline">
        <span class="">What's it all about</span>
        <hr class="lead bg-success w-50">
    </h1>
    <div class="card-deck mx-md-5 pt-md-5  ">
        <div class="card bg-dark text-light info">
            <div class="card-body">
                <h2 class="card-title text-center   ">Explore</h2>
                <hr class="bg-info">
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
               
            </div>
        </div>
        <div class="card bg-white text-dark info animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title text-center   ">Serve</h2>
                <hr class="bg-info">
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
        <div class="card bg-primary text-light info animated fadeInLeft">
            <div class="card-body">
                <h2 class="card-title text-center   ">Earn</h2>
                <hr class="bg-white">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content</p>
            </div>
        </div>
    </div>
</div>
<script>
ScrollReveal({ reset: true });
ScrollReveal().reveal('.punchline'  );
ScrollReveal().reveal('.card' );

</script>
@endsection
