@extends('menu.user.create')

@section('manages')
<div class="row mb-3 form-group">
    <label for="gym" class="col-sm-2 col-form-label">{{ __('Gym') }}</label>

    <div class="col-sm-10">
        <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
            @foreach ($gyms as $gym)
            <option value="{{$gym->id}}">{{$gym->name}}</option>
            @endforeach
            <option value="none">None</option>      
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
<input type="hidden" name="role" value="gym_manager"/>
@endsection

@section('header')
{{ __('New Gym Manager') }}
@endsection