@extends('adminlayout')

@section('content')

    <div class=" p-5 bg-white">
        @if ($message = Session::get('adminMessage'))
            <div class="alert alert-danger">
                <span onclick="this.parentElement.style.display='none'"
                        class="float-right">&times;</span>
                <p>{!! $message !!}</p>
            </div>
            <?php Session::forget('adminMessage');?>
        @endif
        <div class="card col-md-6 mx-auto ">
            <div class="card-body">
                <form  action="/adminauth" method="post">
                @csrf
                    <h3 class="text-secondary">Admin Login</h3>
                    <input type="text" name="username"  class="form-control mt-3" placeholder="Username">
                    <input type="password" name="password"  class="form-control mt-3" placeholder="Password">
                    <input type="submit" value="Login" class="btn btn-primary w-100 mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection