@extends('layouts.datatable')
@section('title')
Attendence
@endsection


@section('tr')
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
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('attendance.index') }}",
      columns: [{
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
      ],
      success: function(response) {
        console.log(response);
      }
    });
  });
</script>
@endrole

@role('cityManager')
<script>
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('attendance.index') }}",
      columns: [{
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
      ],
      success: function(response) {
        console.log(response);
      }
    });
  });
</script>
@endrole

@role('gymManager')
<script>
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('attendance.index') }}",
      columns: [{
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
      ],
      success: function(response) {
        console.log(response);
      }
    });
  });
</script>
@endrole
@endsection