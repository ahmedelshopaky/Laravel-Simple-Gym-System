@extends('layouts.master')
@section('content')

<?php // $gymMember = App\Models\GymMember::where('user_id', $user->id)->get()->first(); 
?>


<section class="content mt-4">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Training Session</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="https://img.freepik.com/free-vector/flat-national-sports-day-illustration_23-2148991395.jpg?w=740" alt="user image">
                                    <span class="username">Training Session Details</span>
                                </div>
                                <table class="table table-borderless text-lg">
                                    <tr>
                                        <td><b>Session ID</b></td>
                                        <td>{{$trainingSession->id}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$trainingSession->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Starts At</b></td>
                                        <td>{{$trainingSession->starts_at}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Finishes At</b></td>
                                        <td>{{$trainingSession->finishes_at}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Trainees</b></td>
                                        <td>{{$trainingSession->gym_members->count()}}</td>
                                    </tr>
                                </table>
                                
                            </div>

                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="https://img.freepik.com/free-vector/flat-national-sports-day-illustration_23-2148991395.jpg?w=740" alt="user image">
                                    <span class="username">Gym Details</span>
                                </div>
                                <table class="table table-borderless text-lg">
                                    <tr>
                                        <td><b>Gym ID</b></td>
                                        <td>{{$trainingSession->gym->id}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$trainingSession->gym->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>City</b></td>
                                        <td>{{$trainingSession->gym->city}}</td>
                                    </tr>
                                </table>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection