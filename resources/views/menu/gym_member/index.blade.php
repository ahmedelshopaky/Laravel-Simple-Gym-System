@extends('layouts.datatable')

@section('title')
Gym Mambers
@endsection

@section('tr')
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let col1 = 'user_id',
    col2 = 'user.name',
    col3 = 'user.email'
    route = "{{ route('gym-members.index') }}",
    url = "/users/";
</script>
@endsection