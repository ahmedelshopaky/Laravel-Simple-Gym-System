@extends('layouts.datatable')

@section('title')
Training Session
@endsection

@section('tr')
<th>Name</th>
<th>Start Time / End Time </th>
<th>Gym</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let columnsArray = [{
    data: 'id'
  }, {
    data: 'name'
  }, {
    data: 'time'
  },{
    data: 'gym_name'
  }, {
    data: 'action',
    orderable: false,
    searchable: false
  }];
  let route = "{{ route('training-sessions.index') }}",
    url = "/training-sessions/";
</script>
@endsection