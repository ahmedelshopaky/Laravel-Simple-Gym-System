@extends('layouts.master')
@section('content')

<div class="wrapper mt-5">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create New Training Session</h3>
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
                                        <form method="POST" action="{{ route('training-sessions.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                                                <label for="starts_at" class="col-md-4 col-form-label text-md-end">{{ __('Starts At') }}</label>

                                                <div class="col-md-6">
                                                    <input id="starts_at" type="datetime-local" class="form-control @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ old('starts_at') }}" required autocomplete="starts_at" autofocus>

                                                    @error('starts_at')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="finishes_at" class="col-md-4 col-form-label text-md-end">{{ __('Finishes At') }}</label>

                                                <div class="col-md-6">
                                                    <input id="finishes_at" type="datetime-local" class="form-control @error('finishes_at') is-invalid @enderror" name="finishes_at" value="{{ old('finishes_at') }}" required autocomplete="finishes_at" autofocus>

                                                    @error('finishes_at')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>




                                            <div class="row mb-3">
                                                <label for="gym" class="col-md-4 col-form-label text-md-end">{{ __('Gym') }}</label>

                                                <div class="col-md-6">
                                                    <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym_id" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
                                                        @foreach ($gyms as $gym)
                                                        <option value="{{$gym->id}}">{{$gym->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('gym')
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

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


@endsection