@extends('layouts.master')
@section('content')

<div class="wrapper mt-4">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('New Gym') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7 container-fluid">
                                        <form method="POST" action="{{ route('gyms.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Gym Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="gym_manager" class="col-md-4 col-form-label text-md-end">{{ __('Gym Manager') }}</label>

                                                <div class="col-md-6">
                                                    <select id="gym_manager" class="form-control @error('gym_manager') is-invalid @enderror" name="gym_manager" value="{{ old('gym_manager') }}" required autocomplete="gym_manager" autofocus>
                                                        @foreach ($gymManagers as $gymManager)
                                                        <option value="{{$gymManager->user_id}}">{{$gymManager->user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('gym_manager')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                            <div class="row mb-3">
                                                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                                                
                                                <div class="col-md-6">
                                                    <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                                        @foreach ($cities as $city)
                                                        <option value="{{$city->city}}">{{$city->city}}</option>
                                                        @endforeach
                                                        <option value="other">Other</option>
                                                    </select>
                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                                <div class="col-md-6">
                                                    <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="In case the city does not exist">

                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            

                                            <div class="row mb-3">
                                                <label for="cover_image" class="col-md-4 col-form-label text-md-end">{{ __('Cover Image') }}</label>
                                                <div class="col-md-6">
                                                    <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" required autofocus />
                                                    @error('cover_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
@endsection