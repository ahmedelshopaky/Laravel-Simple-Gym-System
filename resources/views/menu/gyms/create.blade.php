@extends('layouts.master')
@section('content')

<div class="wrapper w-75 mx-auto">

    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-primary bg-dark p-3">Update Gym Information</h2>
        </div>
        <div class="card-body">
           <form action="{{route('gyms.store')}}" method="post">
               @csrf
               @method('POST')
            <div class=" mb-3 w-50 mx-auto">
                <label for="name">Gym Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Gym Name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class=" mb-3 w-50 mx-auto">
                <label for="city">City Name</label>
                <input type="text" name="city" value="{{old('city')}}" class="form-control" placeholder="City Name">
                @error('city')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class=" mb-3 w-50 mx-auto">
                <label for="city_manager_id">Manager Name</label>
                <select name="city_manager_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->user->id}}" >{{$user->user->name}}</option>
                    @endforeach
                </select>
                @error('city_manager_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="row my-3">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-end">Cover Image</label>
                    <div class="col-md-6">
                        <input id="avatar_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" required autofocus/>
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-success px-4 my-3" value="Save">
                </div>
            </div>
           </form>
        </div>
    </div>
</div>

@endsection