@extends('layouts.create')

@section('header')
Create New Training Session
@endsection


@section('route')
{{ route('training-sessions.store') }}
@endsection


@section('training_session')
<div class="row mb-3">
    <label for="starts_at" class="col-sm-3 col-form-label  ">{{ __('Starts At') }}</label>

    <div class="col-sm-9">
        <input value="@yield('value_starts_at')"  id="starts_at" type="datetime-local" class="form-control @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ old('starts_at') }}" required autocomplete="starts_at" autofocus>

        @error('starts_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <label for="finishes_at" class="col-sm-3 col-form-label "  >{{ __('Finishes At') }}</label>

    <div class="col-sm-9">
        <input value="@yield('value_finishes_at')" id="finishes_at" type="datetime-local" class="form-control @error('finishes_at') is-invalid @enderror" name="finishes_at" value="{{ old('finishes_at') }}" required autocomplete="finishes_at" autofocus>

        @error('finishes_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="gym" class="col-sm-3 col-form-label "  >{{ __('Gym') }}</label>

    <div class="col-sm-9">
        <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym_id" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
            @foreach ($gyms as $gym)
            <option value="{{$gym->id}}">{{$gym->name}}</option>
            @endforeach
            @yield('mygym')
        </select>
        @error('gym')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endsection