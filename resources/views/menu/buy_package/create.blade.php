@extends('layouts.master')
@section('content')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="col-sm-6">
      <h1>Buy Package For Gym Members</h1>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      

                      <form method="POST" action="{{ route('buy-package.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="gym_member" class="col-md-4 col-form-label text-md-end">{{ __('Gym Memeber') }}</label>

                            <div class="col-md-6">
                            <select id="gym_member" class="form-control @error('gym_member') is-invalid @enderror" name="gym_member" value="{{ old('gym_member') }}" required autocomplete="gym_member" autofocus>
                              @foreach ($gymMembers as $gymMember)
                                <option value="{{$gymMember->user_id}}">{{$gymMember->user->name}}</option>
                              @endforeach
                            </select>
                                @error('gym_member')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="training_package" class="col-md-4 col-form-label text-md-end">{{ __('Training Package') }}</label>

                            <div class="col-md-6">
                            <select id="training_package" class="form-control @error('training_package') is-invalid @enderror" name="training_package" value="{{ old('training_package') }}" required autocomplete="training_package" autofocus>
                              @foreach ($trainingPackages as $trainingPackage)
                                <option value="{{$trainingPackage->id}}">{{$trainingPackage->name}} - {{$trainingPackage->price / 100}}$</option>
                              @endforeach
                            </select>
                                @error('training_package')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gym" class="col-md-4 col-form-label text-md-end">{{ __('Gym') }}</label>

                            <div class="col-md-6">
                            <select id="gym" class="form-control @error('gym') is-invalid @enderror" name="gym" value="{{ old('gym') }}" required autocomplete="gym" autofocus>
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

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


@endsection