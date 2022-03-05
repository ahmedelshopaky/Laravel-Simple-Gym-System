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
              <h3 class="card-title">Buy Package For Gym Members</h3>
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
                            <option value="{{$trainingPackage->id}}">{{$trainingPackage->name}} - ${{$trainingPackage->price / 100}}</option>
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