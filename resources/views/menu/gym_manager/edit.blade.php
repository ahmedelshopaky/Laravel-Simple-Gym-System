@extends('menu.user.edit')

@section('manages')
<div class="row mb-3">
    <label for="gym" class="col-sm-12 col-md-2 col-form-label">{{ __('Gym') }}</label>

    <div class="col-sm-12 col-md-9">
        <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
            @foreach ($gyms as $gym)
                @if ($gym->id == $user->gym_manager->gym_id)
                <option value="{{$gym->id}}" selected>{{$gym->name}}</option>
                @else
                <option value="{{$gym->id}}">{{$gym->name}}</option>
                @endif
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
<option value="gym_manager">Gym Manager</option>
@endsection

@section('header')
{{ __('Edit Gym Manager Data') }}
@endsection