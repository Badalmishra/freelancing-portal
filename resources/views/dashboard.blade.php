@extends('adminlayout')
@section('content')
    <div class="row m-0">
        <div class="col-md-2  d-lg-block d-none p-3" style="background:rgba(25, 127, 210, 1) !important;">
            <ul class="nav flex-column text-center mt-5">
            <i class="fa fa-skiing text-white" style="font-size:8rem;"></i>
            <hr class="bg-secondary pt-1 bg-white">
                <div class="text-left ml-2">
                    <li class="nav-item">
                        <a class="nav-link active text-white lead" href="/admin">Search <i class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white lead" href="/report">Reports Claims<i class="fa fa-chart-line"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white lead" href="/Manual">Manual <i class="fa fa-align-left"></i></a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col p-4 bg-white">
            <div class="container p-5">
            <h2 class="text-secondary">User Search</h2>
            <form action="/searchuser">
                <div class="input-group mb-3">
                    <input name="key" type="text" class="form-control" placeholder="test@test.com" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <input name="search" type="submit" value="Search" class="btn btn-outline-secondary" id="button-addon2">
                    </div>
                </div>
            </form>
            <hr class="bg-dark pt-1">
            @if (isset($user))
                <div class="list-group-item m-0">
                    <div class="row">
                        <div class="col-md-1" style="overflow:hidden;">
                        @if (isset($user->pic))
                            <img src="/storage/user/{{$user->pic}}" alt="User image" width="100%">
                        @endif
                        </div>
                        <div class="col-md-3">
                            <a class="lead" href="viewer/{{$user->id}}">@ {{$user->name}} profile </a>
                        </div>
                        <div class="col-md-3">
                            <a href="adminactive/{{$user->id}}" class="lead">ActiveJobs</a>
                        </div>
                        <div class="col-md-3">
                                Paypal :
                            <span class="text-secondary lead">{{$user->paypal}}</span>
                        </div>
                    </div>
                </div>
            @else
            <h1 class="text-dark">No User</h1>
            @endif
            </div>
        </div>
    </div>
@endsection