@extends('layouts.master')
@section('content')

<section class="content mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Success</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- compact('gym', 'triningPackage', 'gymMember') -->
                    <div class="card-body">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Package ({{$triningPackage->name}}) has been purchased</b></h2>
                                    <p class="text-muted text-lg"><b>Client: </b> {{$gymMember->user->name}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted text-md">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Gym Address: {{$gym->city}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Gym Name: {{$gym->name}}</li>
                                    </ul>

                                    <ul class="mt-2 ml-4 mb-0 fa-ul text-muted text-md">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Package Name: {{$triningPackage->name}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Sessions Number: {{$triningPackage->sessions_number}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Price: ${{$triningPackage->price / 100}}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('/images/users/'.$gymMember->user->avatar_image)}}" alt="user-avatar" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection