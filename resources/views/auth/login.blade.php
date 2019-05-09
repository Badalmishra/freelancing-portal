@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/login.css">
<script src="https://unpkg.com/scrollreveal">
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<div class="  " id="">
    
    <div class="row  p-0 m-0">
        <div class="col-lg-8 animated fadeInDown whole " id="logo" >
            <h1 class="text-success display-3 mt-5 " >
               <<!---->Kaam<span class="text-primary">Dhandha</span>/>
                
            </h1>
            <h3 class="text-white ">
                    <span class="text-primary">No More</span> Overheads
            </h3>
            <div class="abt btn btn-lg btn-outline-success ">
                About <span class="text-primary">Us</span>
            </div>
        </div>
        <div class="col-lg-4 bg-primary whole ">
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
                                <button type="submit" class="form-stuff that-up w-100 mx-auto d-block btn-outline-success btn">
                                    Register <span class="text-primary">Here</span>
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

<div class="p-4 p-md-5  bg-white">
    <h1 class="punchline pt-4">
        <span class="">What's it about</span>
        <hr class="lead bg-success w-25 mr-auto">
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
