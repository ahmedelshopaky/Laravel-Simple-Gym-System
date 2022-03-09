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
  let col1 = 'id',
    col2 = 'name',
    col3 = 'city.name';
    route = "{{ route('gyms.index') }}",
    url = "/gyms/";
</script>
@endsection