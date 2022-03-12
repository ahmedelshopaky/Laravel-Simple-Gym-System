@extends('menu.gyms.layout')

@section('method')
POST
@endsection

@section('route')
{{ route('gyms.store') }}
@endsection

@section('title')
New Gym
@endsection