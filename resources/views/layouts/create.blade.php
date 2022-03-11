@extends('layouts.master')
@section('content')

<div class="wrapper mt-5">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2 mt-3">

                    <div class="card card-info ">
                        <div class="card-header py-3">
                            <h2 class="card-title fs-3 text-white">@yield('header')</h2>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <form method="POST" action="@yield('route')" enctype="multipart/form-data">
                                @yield('method')
                                @csrf
                                <div class="card-body ">
                                    <div class="row mb-3 form-group">
                                        <label for="name" class="col-sm-12 col-md-3 col-form-label ">{{ __('Name') }}</label>

                                        <div class="col-sm-12 col-md-9">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@yield('value_name')" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>



                                    @yield('training_package')

                                    @yield('training_session')

                                    <div class="row mb-0">
                                        <div class="col-sm-12 ">
                                            <button type="submit" class="btn btn-info text-white col-sm-12  col-md-2 offset-md-5 fs-5" >
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>


            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>




@endsection