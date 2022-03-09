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
  let col1 = 'id',
    col2 = 'name',
    col3 = 'gym.name';
    route = "{{ route('coaches.index') }}",
    url = "/coaches/";
</script>
@endsection