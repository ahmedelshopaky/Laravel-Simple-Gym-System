@extends('layouts.master')
@section('content')

<section class="content mt-5">
  <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-lg-4 col-6">

                <div class="small-box  info text-white">
                    <div class="inner">
                    @role('admin')
                      <h4 class="">Total Revenue</h4> 
                      @endrole
                      @role('cityManager')
                      <h4 class="">Total Revenue For Your City</h4> 
                      @endrole
                      @role('gymManager')
                      <h4 class="">Total Revenue For Your Gym</h4> 
                      @endrole
                        <h3>${{$totalRevenue / 100}}</h3>
                        
                    </div>
                    <div class="icon">
                        <i class="far fa-usd nav-icon text-white"></i>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4 col-6">

                <div class="small-box info  text-white">
                <div class="inner">
                    @role('admin')
                      <h4 >Total Revenue Last Month</h4> 
                      @endrole
                      @role('cityManager')
                      <h4 >Total Revenue Last Month For Your City </h4> 
                      @endrole
                      @role('gymManager')
                      <h4 >Total Revenue Last Month For Your Gym</h4> 
                      @endrole
                        <h3>${{$totalRevenueLastMonth / 100}}</h3>
                        
                    </div>
                    <div class="icon">
                        <i class="far fa-usd nav-icon text-white"></i>
                    </div>
                   
                </div>
            </div>
            
            <div class="col-lg-4 col-6">

                <div class="small-box info text-white">
                    <div class="inner">
                    @role('admin')
                      <h4 class="">Total Revenue Last Year</h4> 
                      @endrole
                      @role('cityManager')
                      <h4 class="">Total Revenue Last Year For Your City</h4> 
                      @endrole
                      @role('gymManager')
                      <h4 class="">Total Revenue Last Year For Your Gym</h4> 
                      @endrole
                        <h3>${{$totalRevenueLastYear / 100}}</h3>
                        
                    </div>
                    <div class="icon">
                        <i class="far fa-usd nav-icon text-white"></i>
                    </div>
                   
                </div>
            </div>


        </div>
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h4 class="card-title py-2 text-white fs-2">Purchases History</h4>
            <div class="card-tools">
              <button tyh4e="button" class="btn btn-tool" data-card-widget="collah4se" title="Collah4se">
                <i class="fas fa-minus text-white"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="card-body h4t-0">
              <table class="table table-bordered table-hover yajra-datatable data-table" id="">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>package Name</th>
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
          data: 'id',
          name: 'id'
        },{
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