@extends('menu.training_packages.create')
@section('value_name')
{{$package->name}}
@endsection

@section('value_price')
{{$package->price}}
@endsection

@section('value_sessions_number')
{{$package->sessions_number}}
@endsection

@section('header')
Edit Training Package
@endsection

@section('route')
{{ route('training-packages.update', $package->id) }}
@endsection

@section('method')
@method('PUT')
@endsection





