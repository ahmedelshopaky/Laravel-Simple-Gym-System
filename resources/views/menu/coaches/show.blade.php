@extends('layouts.master')
@section('content')
    <div class="card w-50 mx-auto text-white">
        <div class="card-header bg-dark">
            <h2 class="text-center">{{$coach->name}}</h2>
        </div>
        <div class="card-body bg-secondary">
            <div class="row text-center">
                <div class="col-4">
                    <p class="badge badge-light bg-dark fs-4 ">Trainer At </p> 
                </div>
                <div class="col-8">
                    <p class="badge badge-dark fs-4">{{$coach->gym->name}}</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-4">
                    <p class="badge badge-light bg-dark fs-4 ">cover_image </p> 
                </div>
                <div class="col-8">
                    <p class="badge badge-dark fs-4">{{$coach->gym->cover_image}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection