@extends('menu.training_sessions.create')
@section('value_name')
{{$trainingSession->name}}
@endsection

@section('value_starts_at')
{{$trainingSession->starts_at}}
@endsection

@section('value_finishes_at')
{{$trainingSession->finishes_at}}
@endsection

@section('header')
Edit Training Session
@endsection

@section('route')
{{ route('training-sessions.update', $trainingSession->id) }}
@endsection

@section('mygym')
<option value="{{$trainingSession->gym->id}}" selected>{{$trainingSession->gym->name}}</option>
@endsection

@if (!($trainingSession->coaches))
@section('mycoach')
<option value="{{$trainingSession->coaches->first()->id}}" selected>{{$trainingSession->coaches->first()->name}}</option>
@endsection
@endif

@section('method')
@method('PUT')
@endsection