@extends('menu.user.show')
@section('manager')
<div class="col-sm-4 mx-auto">
    <div class="description-block">
        <h5 class="description-header">Gym</h5>
        <span class="description-text">{{$user->gym_manager->gym ? $user->gym_manager->gym->name : 'NONE'}}</span>
    </div>

</div>
@endsection