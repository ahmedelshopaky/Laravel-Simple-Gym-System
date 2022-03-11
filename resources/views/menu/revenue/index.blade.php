@extends('layouts.master')
@section('content')

<section class="content mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 ">

        <div class="card">
          <div class="card-header">
            @role('admin')
            <h3 class="card-title py-3 text-white fs-4">Total Revenue</h3> <!-- ADMIN ONLY -->
            @endrole
            @role('cityManager')
            <h3 class="card-title">Total Revenue For Your City</h3> <!-- CITY MANAGER ONLY -->
            @endrole
            @role('gymManager')
            <h3 class="card-title">Total Revenue For Your Gym</h3> <!-- GYM MANAGER ONLY -->
            @endrole
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus text-white"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>Total Revenue = ${{$totalRevenue / 100}}</b></h2>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- --------------------------------------------------------- -->
  <!-- --------------------------------------------------------- -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title py-3 text-white fs-4">Purchases History</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus text-white"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="card-body pt-0">
              <table class="table table-bordered table-hover yajra-datatable data-table" id="">
                <thead>
                  <tr>
                    <!-- <th>ID</th> -->
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Package Name</th>
                    <th>Amount paid</th>
                    @hasanyrole('admin|cityManager')
                    <th>GYM</th> <!-- CITY MANAGER AND ADMIN ONLY -->
                    @endhasanyrole
                    @role('admin')
                    <th>CITY</th> <!-- ADMIN ONLY -->
                    @endrole
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@role('admin')
<script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var dataTable = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('revenue.index') }}",
      columns: [{
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'gym_member_email',
          name: 'gym_member_email'
        },
        {
          data: 'training_package_name',
          name: 'training_package_name'
        },
        {
          data: 'amount_paid',
          name: 'amount_paid'
        },
        {
          data: 'gym_name', // <!-- CITY MANAGER AND ADMIN ONLY -->
          name: 'gym_name'
        },
        {
          data: 'city', // <!-- ADMIN ONLY -->
          name: 'city'
        },
      ]
    });
  });
</script>
@endrole
@role('cityManager')
<script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var dataTable = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('revenue.index') }}",
      columns: [{
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'gym_member_email',
          name: 'gym_member_email'
        },
        {
          data: 'training_package_name',
          name: 'training_package_name'
        },
        {
          data: 'amount_paid',
          name: 'amount_paid'
        },
        {
          data: 'gym_name', // <!-- CITY MANAGER AND ADMIN ONLY -->
          name: 'gym_name'
        },
      ]
    });
  });
</script>
@endrole
@role('gymManager')
<script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var dataTable = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('revenue.index') }}",
      columns: [{
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'gym_member_email',
          name: 'gym_member_email'
        },
        {
          data: 'training_package_name',
          name: 'training_package_name'
        },
        {
          data: 'amount_paid',
          name: 'amount_paid'
        },
      ]
    });
  });
</script>
@endrole
@endsection