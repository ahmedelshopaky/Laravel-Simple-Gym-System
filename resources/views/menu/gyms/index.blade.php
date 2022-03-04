
   
@extends('layouts.master')
@section('content')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="col-sm-6">
      <h1>Gyms</h1>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gyms Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover yajra-datatable data-table" id="data-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Actions</th>
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
<script>
$(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('gyms.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'city', name: 'city'},    
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    } );
});
</script>

@endsection
