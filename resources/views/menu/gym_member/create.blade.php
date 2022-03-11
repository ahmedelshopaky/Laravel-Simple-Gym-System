@extends('menu.user.create')
@section('gym_member_data')
<div class="row mb-3 form-group">
    <label for="gender" class="col-sm-12 col-md-2 col-form-label">{{ __('Gender') }}</label>

    <div class="col-sm-12 col-md-9">
        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row mb-3 form-group">
    <label for="date_of_birth" class="col-sm-12 col-md-2 col-form-label">{{ __('Date Of Birth') }}</label>

    <div class="col-sm-12 col-md-9">
        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

        @error('date_of_birth')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endsection

@section('role')
<input type="hidden" name="role" value="gym_member"/>
@endsection

@section('header')
{{ __('New Gym Member') }}
@endsection