@extends('layouts.datatable')

@section('title')
Cities
@endsection

@section('tr')
<th>ID</th>
<th>City</th>
<th>City Manager</th>
@endsection

@section('script')
<script>
  let columnsArray=[
    {data : 'city_id'},
    {data : 'city_name'},
    {data : 'city_manager_name'},
  ],
    route = "{{ route('cities.index') }}",
    url = "/cities/";   
</script>
@endsection