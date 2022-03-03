@extends('layouts.master')
@section('content')

<?php // $gymMember = App\Models\GymMember::where('user_id', $user->id)->get()->first(); ?>

<section class="content">

    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <img src="{{asset('/images/users/'.$user->avatar_image)}}" class="img-thumbnail"/>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover yajra-datatable data-table" id="">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>

                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>National ID</td>
                                    <td>{{$user->national_id}}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
<!---------------------------- only gym member can see this section ---------------------------->
                                <tr>                                
                                    <td>Gender</td>
                                    <td>{{$user->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td>{{$user->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td>Last Login</td>
                                    <td>{{$user->last_login}}</td>
                                </tr>
                                <tr>
                                    <td>Email Verified At</td>
                                    <td>{{$user->email_verified_at}}</td>
                                </tr>
<!---------------------------- end of gym member section ---------------------------->
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection