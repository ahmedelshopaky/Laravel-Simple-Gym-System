@extends('menu.user.show')
@section('manager')
<div class="col-sm-4 mx-auto">
    <div class="description-block">
        <h5 class="description-header">City</h5>
        <span class="description-text">{{$user->city_manager ? $user->city_manager->city->name : 'NONE'}}</span>
    </div>

</div>
@endsection