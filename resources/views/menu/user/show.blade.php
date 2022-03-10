@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/css/app.css')}}">



<div class="col-md-10 col-sm-12 offset-md-1 mt-5">

    <div class="card card-widget widget-user card-view">

        <div class="widget-user-header text-white " >
            <h2 class="fw-bold mt-2"> {{$user->name}}</h2>
        </div>
        <div class="widget-user-image">
            <!-- <img class="img-circle elevation-2" src="{{asset('/images/gym-logo.jpg')}}" alt="User Avatar"> -->
            <img src="{{asset('/images/users/'.$user->avatar_image)}}" class="img-thumbnail"/>
        </div>
        <div class="card-footer">

            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">ID</h5>
                        <span class="description-text">{{$user->id}}</span>
                    </div>

                </div>
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">National Id</h5>
                        <span class="description-text"> {{$user->national_id}}</span>

                    </div>

                </div>
                
               
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Email</h5>
                        <span class="description-text"> {{$user->email}}</span>

                    </div>

                </div>
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">Email Verified At</h5>
                        <span class="description-text"> {{$user->email_verified_at ? $user->email_verified_at : 'NONE'}}</span>

                    </div>

                </div>


                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">Created At</h5>
                        <span class="description-text">{{$user->created_at}}</span>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">Role</h5>
                        <span class="description-text">{{$user->role}}</span>
                    </div>

                </div>
                
                
                @yield('manager')


            </div>

        </div>
    </div>

</div>

@endsection