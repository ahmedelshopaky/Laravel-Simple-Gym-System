@extends('layouts.master')
@section('content')

<div class="wrapper mt-4">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2 mt-3">

                    <div class="card card-info">
                        <div class="card-header py-3">
                            <h3 class="card-title fs-3">@yield('header')</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>


                        <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" class="form-horizontal">
                            @method('PUT')
                            @csrf
                            <div class="card-body ">
                                <div class="row mb-3 form-group">

                                    <label for="name" class=" col-sm-12 col-md-2 col-form-label">Name</label>

                                    <div class="col-sm-12 col-md-9">
                                        <input value="{{$user->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 form-group">
                                    <label for="national_id" class="col-sm-12 col-md-2 col-form-label">{{ __('National ID') }}</label>

                                    <div class="col-sm-12 col-md-9">
                                        <input value="{{$user->national_id}}" id="national_id" type="national_id" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id">

                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-12 col-md-2 col-form-label">{{ __('Email Address') }}</label>

                                    <div class="col-sm-12 col-md-9">
                                        <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                @yield('gym_member')
                                @yield('manages')

                                <div class="row mb-3">
                                    <label for="avatar_image" class="col-sm-12 col-md-2 col-form-label">{{ __('Avatar Image') }}</label>
                                    <div class="col-sm-12 col-md-9">
                                        <!--TODO
                                                        Retrive old image into input field -->
                                        <input id="avatar_image" type="file" class="form-control @error('avatar_image') is-invalid @enderror" name="avatar_image" autofocus />
                                        @error('avatar_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="role" class="col-sm-12 col-md-2 col-form-label">{{ __('Role') }}</label>

                                    <div class="col-sm-12 col-md-9">
                                        <select value="{{$user->role}}" id="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                            @yield('role')
                                        </select>
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="row mb-0">
                                    <div class="col-sm-12 ">
                                        <button type="submit" class="btn btn-info text-white  col-md-2 offset-md-5 fs-5">
                                            Submit
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

@endsection