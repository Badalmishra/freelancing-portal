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
                        <a class="nav-link text-white lead" href="/stats">Data Logistics <i class="fa fa-chart-line"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white lead" href="/Manual">Manual <i class="fa fa-align-left"></i></a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col p-4 bg-white">
            <div class="container p-5">
            <h2 class="text-secondary">Active Jobs</h2>
            @if ($message = Session::get('adminMessage'))
            <div class="alert alert-danger">
                    <span onclick="this.parentElement.style.display='none'"
                            class="float-right">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('adminMessage');?>
            @endif
            <hr class="bg-dark pt-1">
            @if (count($jobs))
            @foreach($jobs as $job)
                <div class="card  p-4 mt-3">
                    <div class="row">
                        <div class="col-md-3 ">
                            <h3>{{$job->user->name}}</h3>
                            <p class="lead">
                                <b>{{$job->user->email}}</b>
                                <hr>
                                <i>{{$job->left}} days left</i>
                                <br>
                                <i>{{$job->bids[0]->price}} dollars</i>
                            </p>
                        </div>
                        <div class="col-md-9">
                            <h2 class="text-secondary">{{$job->body}}</h2>
                            <hr class="bg-dark pt-1">
                            <p class="lead">this is some job, what a job, lol job.</p>
                            <a class="btn btn-outline-dark" href="/deleteadmin/{{$job->id}}/{{$job->assignedTo}}" >Delete Job</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h1 class="text-dark">No Jobs</h1>
            @endif
            </div>
        </div>
    </div>
@endsection