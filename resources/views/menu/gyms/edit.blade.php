@extends('menu.gyms.layout')

@section('title')
Edit Gym
@endsection
@section('value_name')
{{$gym->name}}
@endsection

@section('value_gym_manager')
@if ($gymManager != null)
<option value="{{$gymManager->id}}" selected>{{$gymManager->name}}</option>
@endif
@endsection

@section('value_city')
<option value="{{$gym->city->id}}" selected>{{$gym->city->name}}</option>
@endsection

@section('route')
{{ route('gyms.update', $gym->id) }}
@endsection

@section('method')
@method('PUT')
@endsection