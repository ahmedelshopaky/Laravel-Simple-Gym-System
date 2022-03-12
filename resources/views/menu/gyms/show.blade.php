@extends('layouts.master')
@section('content')

<div class="col-sm-10 offset-1 mt-5">
    <div class="card card-info card-view">
        <div class="card-header text-white  ">
            <h1 class="text-center py-4 fw-bold"> <i class="fa-solid fa-dumbbell nav-icon"></i> Gym Data <i class="fa-solid fa-dumbbell nav-icon"></i> </h1>

        </div>
        <div class="row">

            <div class="col-md-4">
                <img src="{{asset('/images/gym-logo.jpg')}}" class="img-fluid rounded-start w-75 mx-4">


            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="fw-bold p-view ">Gym Info </h3>

                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">ID</h5>
                                <span class="description-text">{{$gym->id}}</span>
                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Gym Name</h5>
                                <span class="description-text">{{$gym->name}}</span>
                            </div>

                        </div>
                        <div class="col-sm-4  ">
                            <div class="description-block">
                                <h5 class="description-header"> City Name</h5>
                                <span class="description-text"> {{$gym->city->name}}</span>

                            </div>

                        </div>

                    </div>
                    <h3 class="fw-bold mt-3 p-view" >Gym Manager </h3>

                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Name</h5>
                                @if($gymManagers->count() == 0)
                                <span class="description-text">NONE</span><br/>
                                @else
                                @foreach ($gymManagers as $gymManager)
                                <span class="description-text"> {{$gymManager->user->name}}</span><br/>
                                @endforeach
                                @endif

                            </div>

                        </div>
                        <div class="col-sm-4 ">
                            <div class="description-block">
                                <h5 class="description-header">National ID</h5>
                                @if($gymManagers->count() == 0)
                                <span class="description-text">NONE</span><br/>
                                @else
                                @foreach ($gymManagers as $gymManager)
                                <span class="description-text"> {{$gymManager->user->national_id}}</span>
                                @endforeach
                                @endif

                            </div>

                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Email</h5>
                                @if($gymManagers->count() == 0)
                                <span class="description-text">NONE</span><br/>
                                @else
                                @foreach ($gymManagers as $gymManager)
                                <span class="description-text">{{$gymManager->user->email}}</span>
                                @endforeach
                                @endif
                            </div>

                        </div>
                        @hasanyrole('admin')
                        <h3 class="fw-bold mt-3 p-view" >City Manager </h3>

                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Name</h5>
                                    <span class="description-text"> {{$cityManager ? $cityManager->name : "NONE"}}</span>

                                </div>

                            </div>
                            <div class="col-sm-4 ">
                                <div class="description-block">
                                    <h5 class="description-header">National ID</h5>
                                    <span class="description-text"> {{$cityManager ? $cityManager->national_id : "NONE"}}</span>

                                </div>

                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Email</h5>
                                    <span class="description-text">{{$cityManager ? $cityManager->email : "NONE"}}</span>
                                </div>

                            </div>

                        </div>
                        @endhasanyrole

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection