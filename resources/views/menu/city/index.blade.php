@extends('layouts.datatable')

@section('title')
Cities
@endsection

@section('tr')
<th>ID</th>
<th>City</th>
<th>City Manager</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let col1 = 'city_id',
    col2 = 'city_name',
    col3 = 'city_manager_name';
    route = "{{ route('cities.index') }}",
    url = "/cities/";   // NOT WORKING :D
</script>
@endsection