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
                    <form action="{{route('gyms.update',$gym->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            <div class=" row mb-3 form-group">
                                <label for="city" class="col-sm-2 col-form-label">Gym Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" value="{{$gym->name}}" class="form-control" placeholder="Gym Name">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class=" row mb-3 form-group">
                                <label for="gym_manager_id" class="col-sm-2 col-form-label">Gym Manager</label>
                                <div class="col-sm-10">
                                    <select name="gym_manager_id" class="form-control">
                                        @if ($gym->gym_managers->first())
                                        <option value="{{$gym->gym_managers->first()->user_id}}" selected>{{$gym->gym_managers->first()->user->name}}</option>
                                        @endif
                                        @foreach ($gymManagers as $gymManager)
                                        <option value="{{$gymManager->user->id}}">{{$gymManager->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gym_manager_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary px-4 my-3" value="Update" style="background-color: #17a2b8;">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection