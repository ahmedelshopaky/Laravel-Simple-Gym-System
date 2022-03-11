@extends('layouts.master')
@section('content')


<div class="wrapper mt-5">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8 offset-2">

          <div class="card card-info my-3">
            <div class="card-header py-3">
              <h3 class="card-title fs-3">Buy Package For Gym Members</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">

              <form method="POST" action="{{ route('buy-package.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                  <div class="row mb-3">
                    <label for="gym_member" class="col-sm-12 col-md-3 col-form-label ">{{ __('Gym Memeber') }}</label>

                    <div class="col-sm-12 col-md-9">
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

                  @hasanyrole('admin|cityManager|gymManager')
                  <div class="row mb-3">
                    <label for="training_package" class="col-sm-12 col-md-3 col-form-label ">{{ __('Training Package') }}</label>

                    <div class="col-sm-12 col-md-9">
                      <select id="training_package" class="form-control @error('training_package') is-invalid @enderror" name="training_package" value="{{ old('training_package') }}" required autocomplete="training_package" autofocus>
                        @foreach ($trainingPackages as $trainingPackage)
                        <option value="{{$trainingPackage->id}}">{{$trainingPackage->name}} - ${{$trainingPackage->price
                          / 100}}</option>
                        @endforeach
                      </select>
                      @error('training_package')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endhasanyrole
                  <div class="row mb-3">
                    <label for="gym" class="col-sm-12 col-md-3 col-form-label ">{{ __('Gym') }}</label>

                    <div class="col-sm-12 col-md-9">
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
                    <div class="col-sm-12">
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