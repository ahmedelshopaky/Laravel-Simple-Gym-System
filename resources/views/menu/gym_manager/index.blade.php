@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/css/app.css')}}">

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
                <h3 class="card-title">Gym Managers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped  dtr-inline table-hover data-table w-100" id="">
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
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->


<script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('gym-managers.index') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {
          data: 'user.name',
        },
        {
          data: 'user.email',
        },
        {
          data: 'action',orderable:false,searchable:false
        },
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
    let gymManagerId;
    $('body').on('click','.ban',function () {
       gymManagerId = $(this).data("id");
      $.ajax({
            url: "/gym-managers/ban/" + gymManagerId,
            type: "PUT",
            async:false,
            data: {_token: '{!! csrf_token() !!}',}, 
            success:(response) =>
            {
              table.ajax.reload();
            }  
          });
      
    });
    $('body').on('click','.unban',function () {
       gymManagerId = $(this).data("id");
      $.ajax({
            url: "/gym-managers/unban/" + gymManagerId,
            type: "PUT",
            async:false,
            data: {_token: '{!! csrf_token() !!}',}, 
            success:(response) =>
            {
              table.ajax.reload();
            }  
          });
      
    });
  });
</script>

@endsection