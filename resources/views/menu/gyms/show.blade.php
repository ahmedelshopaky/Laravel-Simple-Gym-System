@extends('layouts.master')
@section('content')

<div class="wrapper w-75 mx-auto">
    <div class="card">
        <div class="card-header text-white bg-dark"><h2 class="text-center">Gym</h2></div>
        <div class="card-body">
            <div class="d-flex">
                <p class="w-50 text-center fw-bold"> Gym Name</p>
                <p class="w-50"> {{$gym->name}}</p>
            </div>
            <hr>
            <div class="d-flex">
                <p class="w-50 text-center fw-bold"> Gym City</p>
                <p class="w-50"> {{$gym->city->name}}</p>
            </div>
            
            <div>
                <h2 class="text-center bg-secondary text-white p-3">Gym Manager info</h2>
            </div>
            
            <div class="d-flex">
                <p class="w-50 text-center fw-bold"> Manager Email</p>
               
                <p class="w-50"> {{$user ? $user->email : "None"}}</p>
            </div>
            <hr>
            <div class="d-flex">
                <p class="w-50 text-center fw-bold"> Manager Name</p>
                <p class="w-50"> {{$user ? $user->name : "None"}}</p>
            </div>
            <hr>
            <div class="d-flex">
                <p class="w-50 text-center fw-bold"> Manager National ID</p>
                <p class="w-50"> {{$user ? $user->national_id : "None"}}</p>
            </div>
            <div class="text-center">
                <a href="{{route('gyms.index')}}" class="btn btn-outline-danger px-4 ">Back</a>
            </div>
            
        </div>
    </div>
</div>
<!-- ./wrapper -->


@endsection