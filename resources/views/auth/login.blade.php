@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/login.css">
<script src="https://unpkg.com/scrollreveal">
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<div class=" big " id="">
    
    <div class="row  p-0 m-0">
        <div class="col-lg-8 animated fadeInDown whole " id="logo" >
            <h1 class="text-success display-3 mt-5 main-logo" >
               <<!---->Kaam<span class="text-primary">Dhandha</span>/>
                
            </h1>
            <h3 class="text-white ">
                    <span class="text-primary">No More</span> Overheads
            </h3>
            <a class="text-success abt btn btn-lg btn-outline-success mt-5 ml-4" href="#about">
                About <span class="text-primary">Us</span>
            </a>
        </div>
        <div class="col-lg-4  whole ">
        <div class="card animated fadeInUp x  mx-auto login-form" >
                <div class="card-header text-success ">Login <span class="text-primary">Here</span> </div>

                <div class="card-body ">
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
                        
                            <div class="form-check mt-3">
                                <input class=" form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        

                            <div class="mt-3 animated fadeInRight">
                                <button type="submit" class="that btn btn-outline-success text-sucess form-stuff w-100">
                                    {{ __('Login') }}
                                </button>
                                <a href="/register" class="form-stuff that-up w-100 mx-auto d-block btn-outline-success btn text-success">
                                    Register <span class="text-primary">Here</span>
                                </a>
                                    
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

<div class="p-5 bg-white why">
    <h1>Why Us <i class="fa fa-search"></i> <hr class="bg-success"></h1>
    <div class="p-5">
        <div class="row justify-content-center p-0 m-0">
            <div class="col-md-4 text-center">
                <i class="fas fa-user-shield text-success icon"></i>
                <h1 class="text-success">
                    Secure
                    <hr class="bg-success">
                </h1>
                <p class="lead">You work and money are secure with us</p>
            </div> 
            <div class="col-md-4 text-center">
                <i class="fa fa-skiing text-dark icon"></i>
                <h1 class="text-dark">
                    Active
                    <hr class="bg-dark">    
                </h1>
                <p class="lead">Always have something to work on.</p>
            </div> 
            <div class="col-md-4 text-center">
                <i class="fa fa-binoculars text-primary icon"></i>
                <h1 class="text-primary">
                    Transparent
                    <hr class="bg-primary">
                </h1>
                <p class="lead">You always know what's up.</p>
            </div> 
        </div>
    </div>
</div>

<div class="p-4 p-md-5  bg- myinfo">
    <h1 class="punchline pt-4">
        <span class="">What's it about</span>
        <hr class="lead bg-success w-25 ml-0 mr-auto">
    </h1>
    <div class="row  myRow">
        <div class="col-md-4 myDef">
            <h1 class="punchline Explore">
                <span class="">Explore</span>
                <hr class="lead bg-success ">
            </h1>
            <p>
                Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
            </p>
        </div>
        <div class="col-md-4 myDef">
            <h1 class="punchline Explore">
                <span class="">Learn</span>
                <hr class="lead bg-dark ">
            </h1>
            <p>
                Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
            </p>
        </div>
        <div class="col-md-4 myDef">
            <h1 class="punchline Explore">
                <span class="">Earn</span>
                <hr class="lead bg-info ">
            </h1>
            <p>
                Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
                adipisicing elit. Excepturi fugit dolores rem odio dolor molestiae officia non ea cumque corrupti.
            </p>
        </div>
    </div>
</div>
<script>
ScrollReveal({ reset: true });
ScrollReveal().reveal('.punchline'  );
ScrollReveal().reveal('.card' );

</script>
@endsection
