@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/pro.css">
    <link rel="stylesheet" href="/css/certain.css">

    <div class="showcase row m-0 px-5 bg-secondary">
        <div class="col-md-6 p-0">
            <div class="row m-0 bg-dark text-white p-0">
                <div class="col-md-4 m-0 p-0">
                    <img src="/images/lol.jpg" style="width:100%;height:180px"alt="">
                </div>
                <div class="col px-5 pt-4">
                    <h1><i class="fa fa-user"></i> {{$user->name}}
                            <hr class="mt-0">
                    </h1>
                    
                    <small>
                        <span><i class="fa fa-envelope"></i> {{$user->email}}</span> 
                        <br>
                        <span>
                            <i class="fa fa-globe-asia"></i>
                            <a href="{{$user->portfolio}}"> {{$user->portfolio}}</a>
                        </span>
                        <br>
                        @php
                        $count =0;
                        $base = count($user->reviews)?count($user->reviews):1
                        @endphp
                        @foreach ($user->reviews as $reviews)
                            @php
                                $count =$count + $reviews->stars;
                            @endphp
                        @endforeach
                        @php
                            $stars = intval($count/$base);
                            $fakestar = 5-$stars
                        @endphp
                        
                        <span style="font-size:20px;font-weight:100;" class="text-warning ">
                           @for ($i = 0; $i < $stars; $i++)
                            <i class="fa fa-star "></i>
                           @endfor
                           @for ($i = 0; $i < $fakestar; $i++)
                            <i class="far fa-star "></i>
                           @endfor
                        </span>
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
              <div class="btn btn-group-vertical w-100 float-right">
                    <div class="btn btn-group m-0 p-0 w-100 mb-1">
                        <div class="btn btn-font btn-primary w-100 mr-1">Resume</div>
                        <div class="btn btn-font btn-outline-success w-100 text-white">Portfolio</div>
                    </div>
                    <div class="btn btn-group m-0 p-0 w-100">
                        <div class="btn btn-font btn-outline-success mr-1 text-white">Facebook</div>
                        <div class="btn btn-font btn-outline-primary text-white">Twitter</div>
                    </div>
              </div>
              
        </div>
    </div>
    <div class=" p-5 bg-white" id="active">
        <h1>Completed Jobs <hr class="mt-1"></h1>
        <div class="row m-0 justify-content-center mt-5 p-5">
            
            @foreach ($jobs as $job)
                
            <div  class="card  mx-1 x  p-0 text-left side col-md-3">
                <div class="card-header bg-dark text-white">
                    {{$job->body}}
                </div>
                <div class="card-body bg-dark text-success   text-center ">
                    <h1 class="text-white">{{$job->bids[0]->price}}</h1>
                    <p>By {{$job->user->name}}</p>
                    <span class="form-control py-0 pt-2 ">Ended on : {{$job->bids[0]->updated_at}}</span>
                </div>
                <div class="card-footer bg-dark">
                        <button   class="btn w-100 btn-sm btn-success disabled">
                            Completed
                        </button> 
                </div>
            </div>

            @endforeach
        </div> 
    </div>
    <div class="pt-1 bg-secondary">
    </div>
    <div class=" bg-white p-5">
        <h2>Reviews</h2>
        <div class="list-group">
         @foreach ($user->reviews as $review)
             <div class="list-group-item">
                 <b>{{$review->body}}</b>
                 <br>
                 <small><i>by:{{$review->reviewer->name}}</i></small>
             </div>
         @endforeach
        </div>
    </div>
@endsection