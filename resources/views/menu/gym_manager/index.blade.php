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
  let columnsArray=[
    {data : 'id'},
    {data : 'name'},
    {data : 'email'},
    {
      data: null,
      render: function(user) 
      {
          return user.banned_at == null ? `<a href="${'/gym-managers/'+user.id}" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                  <a href="${'/gym-managers/'+user.id+'/edit'}" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                  <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="${user.id}"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>
                  <a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-warning btn-sm mr-3 text-white ban" data-id="${user.id}" data-original-title="ban">Ban</a>` 
                  
                  : `<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-success btn-sm mr-3 text-white unban" data-id="${user.id}" data-original-title="unban">UnBan</a>`;
      }
    }
  ],
    route = "{{ route('gym-managers.index') }}",
    url = "/users/";
</script>
@endsection