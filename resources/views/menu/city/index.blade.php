@extends('layouts.master')
@section('content')

<div class="wrapper mt-5">
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cities</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover table-striped  data-table" id="data-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>City</th>
                        <!-- <th>Gym</th> -->
                        <th>City Manager</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">





                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('cities.index') }}",
      columns: [{
          data: 'city_id',
          name: 'city_id'
        },
        {
          data: 'city_name',
          name: 'city_name'
        },
        // {
        //   data: 'gym_name',
        //   name: 'gym_name'
        // },
        {
          data: 'city_manager_name',
          name: 'city_manager_name'
        },
        // {
        //   data: 'action',
        //   orderable: false,
        //   searchable: false
        // },
      ]
    });


  });
</script>

@endsection