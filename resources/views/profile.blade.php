@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/pro.css">
    <link rel="stylesheet" href="/css/certain.css">
    <script>
            function myclick() {
                //console.log("ck");
                var label = document.getElementById("label");
                var inp = event.target.value;
                label.innerText = inp;
                
            }
            
        </script>
    <div class="showcase row m-0 px-5 bg-secondary big">
        <div class="col-md-6 p-0">
            <div class="row m-0 bg-dark text-white p-0">
                <div class="col-md-4 m-0 p-0" style="height:180px;overflow-y:hidden;">
                    @if (isset($user->pic))
                    <img src="/storage/user/{{$user->pic}}" alt="" style="width:100%;" >
                    <form action="/addpic" 
                        method="POST" enctype="multipart/form-data" class="upfor">
                        @csrf
                        
                        <div class="btn btn-group-vertical w-100 mt-4">
                                
                            <label class="btn  btn-outline-dark mb-0 w-100 sm" >
                                    <span id="label" class="text-white p-0 d-block btn sm"></span>
                                     Browse <input type="file" name="cover_image" onchange="myclick()" id="inp" hidden>
                            </label>                            
                            <input type="submit" value="upload" class="sm  btn btn-dark mt-0 w-100">
                        </div>
                        
                    </form>
                    @else
                        <form action="/addpic" method="POST" class="" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="btn btn-group-vertical w-100 mt-4">
                                    
                                <label class="btn btn-primary mb-0 w-100" >
                                        <span id="label" class="text-white p-0 d-block btn "></span>
                                         Browse <input type="file" name="cover_image" onchange="myclick()" id="inp" hidden>
                                </label>                            
                                <input type="submit" value="upload" class="btn btn-info mt-0 w-100">
                            </div>
                            
                        </form>
                        {{-- <img src="/images/lol.jpg" alt="" width="100%" height="180px"> --}}
                    @endif
                    
                </div>
                <div class="col px-5 pt-4">
                    <h1><i class="fa fa-user"></i> 
                        {{$user->name}}
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
                            <form action="/addportfolio" style="display:inline-block;">
                                @csrf
                                
                                <input type="text" name="portfolio" class="form-control form-control-sm " placeholder="enter portfolio hit enter">
                                <input type="submit" hidden>
                            </form>
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
                        <form action="/deleteskills" method="POST" class="col-2 bg-danger p-0">
                            @csrf
                            <input type="text" name="id" hidden value={{$userskill->id}}>
                            <input type="submit" value="Remove" class="btn-danger w-100 p-3 btn btn-lg">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach  
        @endif


        <form action="/adduserskill" class="w-50 mt-4" method="post">
            @csrf
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{!! $message !!}</p>
            </div>
            <?php Session::forget('error');?>
            @endif
            <div class="row m-0">
                <div class="col-6 p-0">
                    <select type="text" class="form-control border-0" name="skills_id">
                        @foreach ($skills as $skill)
                            <option class=" form-input-skill " value={{$skill->id}}>{{$skill->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 p-0">
                    <input type="text" class="form-control  form-input-skill" name="yoe" placeholder="Add Years of Experience">
                </div>
            </div>
            <input type="submit" value="ADD" class="form-control btn btn-success form-input-skill" >
        </form>
        

    </div>
  
@endsection
