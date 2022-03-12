@extends('layouts.datatable')

@section('title')
Gym Members
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
    {data : 'user_id'},
    {data : 'user.name'},
    {data : 'user.email'},
    {
      data: null,
      render: function(user) 
      {
          
          return `<a href="${'/gym-members/'+user.user.id}" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                  <a href="${'/gym-members/'+user.user.id+'/edit'}" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                  <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="${user.user.id}"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>`;
      }
    }
  ],
    route = "{{ route('gym-members.index') }}",
    url = "/users/";
</script>
@endsection