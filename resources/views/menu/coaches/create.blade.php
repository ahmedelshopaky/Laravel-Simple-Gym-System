@extends('layouts.master')
@section('content')

<div class="wrapper mt-4">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2 mt-3">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title fs-3">{{ __('New Coach') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        
                                        <form method="POST" action="{{ route('coaches.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                            <div class="card-body pt-0">

                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-12 col-md-2 col-form-label">{{ __('Name') }}</label>

                                                <div class="col-sm-12 col-md-8">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="gym" class="col-sm-12 col-md-2 col-form-label">{{ __('Gym') }}</label>

                                                <div class="col-sm-12 col-md-8">
                                                    <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym" required autocomplete="gym" autofocus>
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
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-info text-white col-sm-12  col-md-2 offset-md-5 fs-5">
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


        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
@endsection


