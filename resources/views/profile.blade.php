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
                    <h1><i class="fa fa-user"></i> User Name
                            <hr class="mt-0">
                    </h1>
                    
                    <small>
                        <span><i class="fa fa-envelope"></i> user@mail.com</span> 
                        <br>
                        <span><i class="fa fa-globe-asia"></i> www.portfolio.com</span>
                        <br>
                        <span style="font-size:20px;font-weight:100;" class="text-warning ">
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
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
            <div  class="card  mx-1 x  p-0 text-left side col-md-3">
                <div class="card-header bg-dark text-white">
                    Job Name
                </div>
                <div class="card-body bg-dark text-success   text-center ">
                    <h1 class="text-white">Price</h1>
                    <p>By client Name</p>
                    <span class="form-control py-0 pt-2 ">Ended on : 00-00-0000</span>
                </div>
                <div class="card-footer bg-dark">
                        <button   class="btn w-100 btn-sm btn-success disabled">
                            Completed
                        </button> 
                </div>
            </div>
            <div  class="card  mx-1 x  p-0 text-left side col-md-3">
                <div class="card-header bg-dark text-white">
                    Job Name
                </div>
                <div class="card-body bg-dark text-success   text-center ">
                    <h1 class="text-white">Price</h1>
                    <p>By client Name</p>
                    <span class="form-control py-0 pt-2 ">Ended on : 00-00-0000</span>
                </div>
                <div class="card-footer bg-dark">
                        <button   class="btn w-100 btn-sm btn-success disabled">
                            Completed
                        </button> 
                </div>
            </div>
        </div>
        
    </div>
    <div class="pt-1 bg-secondary">
    </div>
    <div class=" bg-white p-5">
        <div class="row m-0 review w-75 mx-auto">
            <div class="col-md-4 p-5 " style="background:black;">
                <h1 class="text-white pl-4">
                    Your <br>
                    Reviews<br>
                    Matter <br>
                </h1>
            </div>
            <div class="col-md-8 p-5 bg-default" >
                <form class="form">
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
