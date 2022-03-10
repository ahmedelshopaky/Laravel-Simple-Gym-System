@extends('layouts.master')
@section('content')

<div class="col-md-10 col-sm-12 offset-md-1 mt-5 ">
    <div class="card card-info card-view">
        <div class="card-header text-white  ">
            <h1 class="text-center py-4 fw-bold"> <i class="fa-solid fa-dumbbell nav-icon"></i> Training Packages  Data <i class="fa-solid fa-dumbbell nav-icon"></i> </h1>

        </div>
        <div class="row">

            <div class="col-md-4">
                <img src="{{asset('/images/gym-logo.jpg')}}" class="img-fluid rounded-start w-75 mx-4">
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="card-body ">

                    <div class="row" > 
                        <div class="col-sm-4 border-right ">
                            <div class="description-block">
                                <h5 class="description-header">Package Name</h5>
                                <span class="description-text">{{$package->name}}</span>
                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Price</h5>
                                <span class="description-text">{{$package->price}}</span>
                            </div>

                        </div>
                        <div class="col-sm-4  ">
                            <div class="description-block">
                                <h5 class="description-header"> City</h5>
                                <span class="description-text">{{$package->sessions_number}}</span>

                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection