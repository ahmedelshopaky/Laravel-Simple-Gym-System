@extends('menu.user.edit')

@section('manages')
<div class="row mb-3">
    <label for="city" class="col-sm-2 col-form-label">{{ __('City') }}</label>

    <div class="col-sm-10">
        <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
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