@extends('layouts.datatable')
@section('title')
Gyms
@endsection



@section('tr')
<th>ID</th>
<th>Name</th>
<th>City</th> <!-- ADMIN OLNLY -->
<th>Actions</th>
@endsection
@section('script')


<script>
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('gyms.index') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'city.name',
          name: 'city.name'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
    var gymId;
    $('body').on('click', '.delete', function() {
      gymId = $(this).data("id");
      $('body').on('click', '.deleteManager', (event) => {
        $.ajax({
          url: "/gyms/" + gymId,
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