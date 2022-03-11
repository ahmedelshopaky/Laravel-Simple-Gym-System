@extends('menu.user.edit')

@section('manages')
<div class="row mb-3">
    <label for="city" class="col-sm-12 col-md-2 col-form-label">{{ __('City') }}</label>

    <div class="col-sm-12 col-md-9">
        <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
            <option value="{{$user->city_manager->city->id}}" selected>{{$user->city_manager->city->name}}</option>
            <option value="other">Other</option>

        </select>
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="new_city" class="col-sm-12 col-md-2 col-form-label">{{ __('New City') }}</label>

    <div class="col-sm-12 col-md-9">
        <input id="new_city" type="text" class="form-control @error('new_city') is-invalid @enderror" name="new_city" value="{{ old('new_city') }}" autocomplete="new_city" autofocus placeholder="In case you want to create a new city">

        @error('new_city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endsection

@section('role')
<option value="city_manager">City Manager</option>
@endsection

@section('header')
{{ __('Edit City Manager Data') }}
@endsection