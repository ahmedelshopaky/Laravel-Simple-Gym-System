@extends('menu.user.create')

@section('manages')
<div class="row mb-3">
    <label for="gym" class="col-md-4 col-form-label text-md-end">{{ __('Gym') }}</label>

    <div class="col-md-6">
        <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
            @foreach ($gyms as $gym)
            <option value="{{$gym->id}}">{{$gym->name}}</option>
            @endforeach
        </select>
        @error('gym')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endsection

@section('role')
<option value="gym_manager">Gym Manager</option>
@endsection

@section('header')
{{ __('New Gym Manager') }}
@endsection