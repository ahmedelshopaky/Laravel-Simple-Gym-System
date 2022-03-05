@extends('layouts.master')
@section('content')

<div class="wrapper mt-5">
  <!-- Content Wrapper. Contains page content -->
  <div class="">

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">City Managers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped data-table" id="data-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
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
<!-- ./wrapper -->



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/node-snackbar/0.1.16/snackbar.min.js" integrity="sha512-iILlngu0qmiyIkOH6MV1RWSya+DL2uzo0cb/nKR4hqwz9H+Xnop1++f8TMw1j5CdbutXGkBUyfRUfg/hmNBfZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!-- AdminLTE App --> --}}
{{-- <script src="../../dist/js/adminlte.min.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>

$(function () {
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('city-managers.index') }}",
        columns: [
            {data: 'user_id'},
            {data: 'user.name'},
            {data: 'user.email'},
            {data: 'action', orderable: false, searchable: false},
        ]
    } );

    var ManagerId;
    $('body').on('click', '.delete', function() {
       ManagerId = $(this).data("id");
       $('body').on('click','.deleteManager', (event) => {
        $.ajax({
            url: "/users/" + ManagerId,
            type: "DELETE",
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