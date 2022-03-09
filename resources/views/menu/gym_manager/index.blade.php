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
  let col1 = 'id',
    col2 = 'name',
    col3 = 'email',
    route = "{{ route('gym-managers.index') }}",
    url = "/users/";
</script>
@endsection