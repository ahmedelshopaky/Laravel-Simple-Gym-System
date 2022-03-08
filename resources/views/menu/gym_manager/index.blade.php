@extends('layouts.datatable')
@section('title')
Gym Managers
@endsection


@section('tr')
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Actions</th>
@endsection

@section('script')
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
      columns: [{
          data: 'user_id',
        },
        {
          data: 'user.name',
        },
        {
          data: 'user.email',
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
    var ManagerId;
    $('body').on('click', '.delete', function() {

      ManagerId = $(this).data("id");
      $('body').on('click', '._delete', (event) => {
        $.ajax({
          url: "/users/" + ManagerId,
          type: "DELETE",
          async: false,
          data: {
            _token: '{!! csrf_token() !!}',
          },
          success: (response) => {
            $('#deleteAlert').modal('hide');
            table.ajax.reload();
          }
        });
      });
    });
  });
</script>
@endsection