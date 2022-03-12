@extends('layouts.master')
@section('content')

<div class="wrapper mt-5">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2 mt-3">

                    <div class="card">
                        <div class="card-header py-3">
                            <h3 class="card-title text-white fs-2">@yield('title')</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                            </div>
                        </div>


                            <form method="POST" action="@yield('route')" enctype="multipart/form-data">
                                @csrf
                                @yield('method')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-12 col-md-2 col-form-label">{{ __('Gym Name') }}</label>

                                        <div class="col-sm-12 col-md-9">
                                            <input value="@yield('value_name')" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="gym_manager" class="col-sm-12 col-md-2 col-form-label">{{ __('Gym Manager') }}</label>

                                        <div class="col-sm-12 col-md-9">
                                            <select id="gym_manager" class="form-control @error('gym_manager') is-invalid @enderror" name="gym_manager" value="{{ old('gym_manager') }}" required autocomplete="gym_manager" autofocus>
                                                @foreach ($gymManagers as $gymManager)
                                                <option value="{{$gymManager->user_id}}">{{$gymManager->user->name}}</option>
                                                @endforeach
                                                @yield('value_gym_manager')
                                            </select>
                                            @error('gym_manager')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="city_id" class="col-sm-12 col-md-2 col-form-label">{{ __('City') }}</label>

                                        <div class="col-sm-12 col-md-9">
                                            <select id="city_id" class="form-control @error('city_id') is-invalid @enderror" name="city_id" value="{{ old('city_id') }}" required autocomplete="city_id" autofocus>
                                                @foreach ($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                                @yield('value_city')
                                                <option value="other">Other</option>
                                            </select>
                                            @error('city_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @yield('new_city')


                                    <div class="row mb-3">
                                        <label for="cover_image" class="col-sm-12 col-md-2 col-form-label">{{ __('Cover Image') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" autofocus />
                                            @error('cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-info text-white  col-md-2 offset-md-5 fs-5">
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


<!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
@endsection