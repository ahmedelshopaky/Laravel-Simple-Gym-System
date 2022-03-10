
@extends('layouts.master')
@section('content')

<div class="col-md-10  offset-md-1 mt-5">
    <div class="card card-info card-view">
        <div class="card-header text-white  ">
            <h1 class="text-center py-4 fw-bold"> <i class=" fa-solid fa-person-running nav-icon"></i> Coaches Data <i class="fa-solid fa-person-running nav-icon"></i> </h1>

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
                                <h5 class="description-header">Coach ID</h5>
                                <p class="description-text mt-3">{{$coach->id}}</p>
                            </div>

                        </div>
                        <div class="col-sm-4 border-right ">
                            <div class="description-block">
                                <h5 class="description-header"> Name</h5>
                                <p class="description-text mt-3">{{$coach->name}}</p>
                            </div>

                        </div>
                        <div class="col-sm-4 ">
                            <div class="description-block">
                                <h5 class="description-header">Gym </h5>
                                <p class="description-text mt-3">{{$coach->gym->name}}</p>
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