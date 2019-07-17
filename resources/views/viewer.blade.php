@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/pro.css">
    <link rel="stylesheet" href="/css/certain.css">

    <div class="showcase row m-0 px-5 bg-secondary big">
        <div class="col-md-6 p-0">
            <div class="row m-0 bg-dark text-white p-0">
                <div class="col-md-4 m-0 p-0" style="height:180px;overflow-y:hidden;">
                        @if (isset($user->pic))
                        <img src="/storage/user/{{$user->pic}}" alt="" style="width:100%;" >                        
                        @else
                        <img src="/images/lol.jpg" alt="" style="width:100%;" >
                        @endif                </div>
                <div class="col px-5 pt-4">
                    <h1><i class="fa fa-user"></i> {{$user->name}}
                            <hr class="mt-0">
                    </h1>
                    
                    <small>
                        <span><i class="fa fa-envelope"></i> {{$user->email}}</span> 
                        <br>
                        <span>
                            <i class="fa fa-globe-asia"></i>
                            @if ($user->portfolio)
                            <a href="{{$user->portfolio}}"> {{$user->portfolio}}</a>
                            @else
                            No Portfolio Yet.
                            @endif
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
                        <a href="#reviews" class="btn btn-font btn-primary w-100 mr-1">Reviews</a>
                        <a href="#completed" class="btn btn-font btn-outline-success w-100 text-white">Completed</a>
                    </div>
                    <div class="btn btn-group m-0 p-0 w-100">
                        <a href="#skills" class="btn btn-font btn-outline-success mr-1 text-white">Skill Sets</a>
                        <a href="#form" class="btn btn-font btn-outline-primary text-white">Feedback</a>
                    </div>
              </div>
              
        </div>
    </div>
    <div class=" p-5 bg-white" id="completed">
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
    <div class=" bg-white p-5" id="reviews">
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
    <div class="bg-primary p-5" id="skills">
        @if (!count($user->userskills))
        <div class="list-group">
            <div class="list-group-item p-0">
                <div class="row m-0 p-0">
                    <div class="col skillbox p-3"><b>No Skills Yet</b></div>
                    <div class="col p-3">for 0 years</div>
                </div>
            </div>
        </div>
        @else
            @foreach ($user->userskills as $userskill)
            <div class="list-group">
                <div class="list-group-item p-0">
                    <div class="row m-0 p-0">
                        <div class="col skillbox p-3"><b>{{$userskill->skills->name}}</b></div>
                        <div class="col p-3">for {{$userskill->yoe}} years </div>
                    </div>
                </div>
            </div>
            @endforeach  
        @endif
    </div>
    <div class="pt-1 bg-secondary"></div>
    <div class=" bg-white p-5" id="form">
        <div class="row m-0 review w-75 mx-auto">
            <div class="col-md-4 p-5 " style="background:black;">
                <h1 class="text-white pl-4">
                    Your <br>
                    Reviews<br>
                    Matter <br>
                </h1>
            </div>
            <div class="col-md-8 p-5 bg-default" >
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('error');?>
                @endif
                <form class="form" method="POST" action="/makeReview">
                    @csrf
                    <input type="text" name="id" value={{$user->id}} hidden>
                    <input type="text" class="form-control mb-2" placeholder="Review" name="review">
                    <select name="stars" id="" class="form-control mb-2">
                        <option value="1">1 star</option>
                        <option value="2">2 stars</option>
                        <option value="3">3 stars</option>
                        <option value="4">4 stars</option>
                        <option value="5">5 stars</option>
                    </select>
                    <input type="submit" value="Submit" class="btn btn-outline-dark w-100">
                </form>
            </div>
        </div>
    </div>
@endsection
