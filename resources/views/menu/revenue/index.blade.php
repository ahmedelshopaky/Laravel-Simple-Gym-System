@extends('layouts.master')
@section('content')

<section class="content mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            @role('admin')
            <h3 class="card-title">Total Revenue</h3> <!-- ADMIN ONLY -->
            @endrole
            @role('cityManager')
            <h3 class="card-title">Total Revenue For Your City</h3> <!-- CITY MANAGER ONLY -->
            @endrole
            @role('gymManager')
            <h3 class="card-title">Total Revenue For Your Gym</h3> <!-- GYM MANAGER ONLY -->
            @endrole
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
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
            <h3 class="card-title">Purchases History</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
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
                    <th>GYM</th> <!-- CITY MANAGER AND ADMIN ONLY -->
                    <th>CITY</th> <!-- ADMIN ONLY -->
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
<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->

<script src="../../plugins/jquery/jquery.min.js"></script>

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

@endsection