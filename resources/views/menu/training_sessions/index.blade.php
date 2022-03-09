@extends('layouts.datatable')

@section('title')
Training Session
@endsection

@section('tr')
<th>Name</th>
<th>Time</th>
<th>Gym</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let col1 = 'name',
    col2 = 'time',
    col3 = 'gym_name';
    route = "{{ route('training-sessions.index') }}",
    url = "/training-sessions/";
</script>
@endsection