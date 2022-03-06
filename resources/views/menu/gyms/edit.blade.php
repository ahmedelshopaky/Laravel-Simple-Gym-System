@extends('layouts.master')
@section('content')

<div class="wrapper  mx-auto mt-3">
<div class="container-fluid">
<div class="row">
    <div class="col-8 offset-2 mt-3">
    <div class="card card-info">
        <div class="card-header py-3">
            <h2 class="card-title fw-bold">Update Gym Information</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
           <form action="{{route('gyms.update',$modifyGym->id)}}" method="post">
               @csrf
               @method('PUT')
               <div class="card-body">
            

            <div class=" row mb-3 form-group">
                <label for="city" class="col-sm-2 col-form-label">Gym Name</label>
                <div class="col-sm-10">
                <input type="text" name="city" value="{{$modifyGym->name}}" class="form-control" placeholder="Gym Name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>




            <div class=" row mb-3 form-group">
                <label for="city" class="col-sm-2 col-form-label">City Name</label>
                <div class="col-sm-10">
                <input type="text" name="city" value="{{$modifyGym->city}}" class="form-control" placeholder="City Name">
                @error('city')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>
            <div class=" row mb-3 form-group">
                <label for="city_manager_id" class="col-sm-2 col-form-label">Manager Name</label>
                <div class="col-sm-10">
                <select name="city_manager_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->user->id}}" >{{$user->user->name}}</option>
                    @endforeach
                </select>
                @error('city_manager_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div>
                    <input type="submit" class="btn btn-primary px-4 my-3" value="Update" style="background-color: #17a2b8;">
                </div>
            </div>
           </form>
        </div>
    </div>
</div>
</div>
    </div>
</div>
@endsection