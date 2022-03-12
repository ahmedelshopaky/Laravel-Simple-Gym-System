@extends('layouts.datatable')

@section('title')
Training Session
@endsection

@section('tr')
<th>ID</th>
<th>Name</th>
<th>Start Time / End Time </th>
<th>Gym</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let columnsArray=[
    {data : 'id'},
    {data : 'name'},
    {data : 'time'},
    {data : 'gym_name'},
    {
      data: null,
      render: function(session) 
      {
          
          return `<a href="${'/training-sessions/'+session.id}" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                  <a href="${'/training-sessions/'+session.id+'/edit'}" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                  <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="${session.id}"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>`;
      }
    }
  ],
    route = "{{ route('training-sessions.index') }}",
    url = "/training-sessions/";
</script>
@endsection