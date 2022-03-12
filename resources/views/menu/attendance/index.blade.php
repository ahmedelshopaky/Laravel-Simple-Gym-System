@extends('layouts.datatable')
@section('title')
Attendence
@endsection


@section('tr')
<th>ID</th>
<th>Client</th>
<th>Training Session</th>
<th>Date / Time</th>
<!-- what is the date / time should i show ? attendance time ? or session starts time ? -->
<th>Status</th>
@hasanyrole('admin|cityManager')
<th>GYM</th> <!-- CITY MANAGER AND ADMIN ONLY -->
@endhasanyrole
@role('admin')
<th>CITY</th> <!-- ADMIN ONLY -->
@endrole
@endsection



@section('script')
@role('admin')
<script>
  let route="{{ route('attendance.index') }}",
  columnsArray=[
        {
          data: 'id',
          name: 'id'
        },
        {
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'training_session_name',
          name: 'training_session_name'
        },
        {
          data: 'training_session_starts_at',
          name: 'training_session_starts_at'
        },
        {
          data: 'status',
          name: 'status'
        },
        {
          data: 'gym_name', // <!-- CITY MANAGER AND ADMIN ONLY -->
          name: 'gym_name'
        },
        {
          data: 'city', // <!-- ADMIN ONLY -->
          name: 'city'
        },
   ];
</script>
@endrole

@role('cityManager')
<script>
  let route="{{ route('attendance.index') }}",
  columnsArray=[
    {
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'training_session_name',
          name: 'training_session_name'
        },
        {
          data: 'training_session_starts_at',
          name: 'training_session_starts_at'
        },
        {
          data: 'status',
          name: 'status'
        },
        {
          data: 'gym_name', // <!-- CITY MANAGER AND ADMIN ONLY -->
          name: 'gym_name'
        },
  ];
</script>
@endrole

@role('gymManager')
<script>
  let route="{{ route('attendance.index') }}", 
  columnsArray=[
        {
          data: 'gym_member_name',
          name: 'gym_member_name'
        },
        {
          data: 'training_session_name',
          name: 'training_session_name'
        },
        {
          data: 'training_session_starts_at',
          name: 'training_session_starts_at'
        },
        {
          data: 'status',
          name: 'status'
        },
  ];
</script>
@endrole
@endsection