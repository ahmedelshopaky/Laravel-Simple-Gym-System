@extends('layouts.create')

@section('header')
Create Training Package
@endsection

@section('route')
{{ route('training-packages.store') }}
@endsection

@section('training_package')
<div class="row mb-3">
    <label for="sessions_number" class="col-sm-12 col-md-3 col-form-label ">{{ __('Sessions Number') }}</label>

    <div class="col-sm-12 col-md-9">
        <input value="@yield('value_sessions_number')" id="sessions_number" type="text" class="form-control @error('sessions_number') is-invalid @enderror" name="sessions_number" value="{{ old('sessions_number') }}" required autocomplete="sessions_number" autofocus>

        @error('sessions_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>





<div class="row mb-3">
    <label for="price" class="col-sm-12 col-md-3 col-form-label ">{{ __('Price ($)') }}</label>

    <div class="col-sm-12 col-md-9">
        <input value="@yield('value_price')" id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endsection