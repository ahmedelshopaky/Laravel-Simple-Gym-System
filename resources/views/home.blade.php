@extends('layouts.master')

@section('content')


<section class="content mt-5 home">
    <div class="container ">
        <div class="row justify-content-center">
            <h1 class="text-center text-white mb-5">Welcome {{ Auth::user()->name }}</h1>
            <h1 class="text-center text-white mb-5">Ready to Burn ??</h1>
            <div class="col-lg-3 col-6">

                <div class="small-box  info text-white">
                    <div class="inner">
                        <h3>150</h3>
                        <p>City Managers</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Gym Managers</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-address-card nav-icon"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Gyms</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-dumbbell nav-icon"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection