@extends('menu.gyms.layout')

@section('method')
@method('POST')
@endsection

@section('route')
{{ route('gyms.store') }}
@endsection

@section('title')
New Gym
@endsection

@section('new_city')
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