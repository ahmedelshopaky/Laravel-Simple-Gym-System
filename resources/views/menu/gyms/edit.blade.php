@extends('layouts.master')
@section('content')

<div class="wrapper w-75 mx-auto">

    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-primary bg-dark p-3">Update Gym Information</h2>
        </div>
        <div class="card-body">
           <form action="{{route('gyms.update',$modifyGym->id)}}" method="post">
               @csrf
               @method('PUT')
            <div class=" mb-3 w-50 mx-auto">
                <label for="name">Gym Name</label>
                <input type="text" name="name" value="{{$modifyGym->name}}" class="form-control" placeholder="Gym Name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class=" mb-3 w-50 mx-auto">
                <label for="city">City Name</label>
                <input type="text" name="city" value="{{$modifyGym->city}}" class="form-control" placeholder="City Name">
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
                <div>
                    <input type="submit" class="btn btn-primary px-4 my-3" value="Update">
                </div>
            </div>
           </form>
        </div>
    </div>
</div>

@endsection