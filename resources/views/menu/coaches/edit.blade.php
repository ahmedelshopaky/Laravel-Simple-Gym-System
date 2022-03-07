@extends('layouts.master')
@section('content')
    <div class="card w-50 mx-auto text-white">
        <div class="card-header bg-dark">
            <h2 class="text-center">update Coach</h2>
        </div>
        <div class="card-body">
            <form action="{{route('coaches.update',$coach->id)}}" method="post">
                @csrf
                @method('PUT')
                <label for="name" class="form-label text-dark">Coach Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$coach->name}}"/>
                @error('name')
                    <p class="text-danger ">{{$message}}</p>
                @enderror
                <input type="submit" class="btn btn-primary my-3" value="Update"/>
            </form>
        </div>
    </div>
@endsection