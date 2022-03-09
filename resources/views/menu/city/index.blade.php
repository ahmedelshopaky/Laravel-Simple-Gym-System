@extends('layouts.datatable')
@section('title')
Cities
@endsection


@section('tr')
<th>ID</th>
<th>City</th>
<!-- <th>Gym</th> -->
<th>City Manager</th>
<!-- <th>Actions</th> -->
@endsection

@section('script')



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