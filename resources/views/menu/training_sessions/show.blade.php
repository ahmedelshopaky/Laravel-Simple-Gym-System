@extends('layouts.master')
@section('content')

<div class="col-md-10 col-sm-12 offset-md-1 mt-5">
    <div class="card card-info card-view">
        <div class="card-header text-white  ">
            <h1 class="text-center py-4 fw-bold"> <i class="fa-solid fa-person-running nav-icon"></i> Training Session <i class="fa-solid fa-person-running nav-icon"></i> </h1>

        </div>
        <div class="row">

            <div class="col-md-4">
                <img src="{{asset('/images/gym-logo.jpg')}}" class="img-fluid rounded-start w-75">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="fw-bold p-view">Training Session Details </h3>

                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">ID</h5>
                                <p class="description-text mt-2">{{$trainingSession->id}}</p>
                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">TrainingSession Name</h5>
                                <p class="description-text mt-2">{{$trainingSession->name}}</p>
                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"> Trainees</h5>
                                <p class="description-text mt-2"> {{$trainingSession->gym_members->count()}}</p>

                            </div>

                        </div>
                        <div class="col-sm-4  mt-3 offset-2 ">
                            <div class="description-block">
                                <h5 class="description-header"> Starts At</h5>
                                <p class="description-text mt-2"> {{$trainingSession->starts_at}}</p>

                            </div>

                        </div>
                        <div class="col-sm-4  mt-3 ">
                            <div class="description-block">
                                <h5 class="description-header"> Finishes At</h5>
                                <p class="description-text mt-2"> {{$trainingSession->starts_at}}</p>

                            </div>

                        </div>

                    </div>
                    <hr>
                    <h3 class="fw-bold mt-5 p-view">Gym Details </h3>

                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Gym Id</h5>
                                <p class="description-text mt-2"> {{$trainingSession->gym->id}}</p>

                            </div>

                        </div>
                        <div class="col-sm-4 ">
                            <div class="description-block">
                                <h5 class="description-header">Gym Name</h5>
                                <p class="description-text mt-2"> {{$trainingSession->gym->name}}</p>

                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"> City</h5>
                                <p class="description-text mt-2">{{$trainingSession->gym->city->name}}</p>
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