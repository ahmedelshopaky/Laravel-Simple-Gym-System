@extends('layouts.master')
@section('content')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="col-sm-6">
      <h1>Users</h1>
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover yajra-datatable data-table" id="data-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
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
            {{-- modal  --}}
            <div class="modal" id="deleteAlert" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h1 class="modal-title text-center mx-auto"><span class="badge bg-danger">Warning</span></h1>
                  </div>
                  <div class="modal-body bg-secondary text-white">
                    <p class="text-center h3 ">Do you want to delete This Post ? </p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 deleteManager" data-original-title="Delete">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          {{-- end of modal --}}

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
{{-- <!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
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
<script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->

<script>
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('gym-members.index') }}",
        columns: [
            {data: 'user_id',},
            {data: 'user.name',},
            {data: 'user.email',},
            {data: 'action', orderable: false, searchable: false},
        ]
    });
    var ManagerId;
    $('body').on('click', '.delete', function() {
       ManagerId = $(this).data("id");
       $('body').on('click','.deleteManager', (event) => {
        $.ajax({
            url: "/users/" + ManagerId,
            type: "DELETE",
            async:false,
            data: {_token: '{!! csrf_token() !!}',}, 
            success:(response) =>
            {
              $('#deleteAlert').modal('hide');
              table.ajax.reload();
            }  
          });
        });
    });


});



</script>

@endsection