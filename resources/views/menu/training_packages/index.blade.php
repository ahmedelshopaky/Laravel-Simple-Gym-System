@extends('layouts.datatable')
@section('title')
Training Package 
@endsection


@section('tr')
<th>ID</th>
<th>Name</th>
<th>Sessions Number</th>
<th>Price</th>
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
      ajax: "{{ route('training-packages.index') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'sessions_number',
          name: 'sessions_number'
        },
        {
          data: 'price',
          name: 'price'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });

    var id;
    $('body').on('click', '.delete', function() {

      id = $(this).data("id");
      $('body').on('click', '.delete_package', (event) => {
        $.ajax({
          url: "/training-packages/" + id,
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