@extends('layouts.datatable')
@section('title')
Coaches
@endsection


@section('tr')
<th>ID</th>
<th>Name</th>
<th>Gym Name</th>
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
      ajax: "{{ route('coaches.index') }}",
      columns: [{
          data: 'id'
        },
        {
          data: 'name'
        },
        {
          data: 'gym.name'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
    var coachId;
    $('body').on('click', '.delete', function() {
      coachId = $(this).data("id");

      $('body').on('click', '.deleteManager', () => {
        $.ajax({
          url: "/coaches/" + coachId,
          type: "DELETE",
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