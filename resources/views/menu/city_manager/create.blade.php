@extends('menu.user.create')

@section('manages')
<div class="row mb-3">
    <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

    <div class="col-md-6">
        <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
            <option value="other">Other</option>
        </select>
        @error('city')
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
{{ __('New City Manager') }}
@endsection