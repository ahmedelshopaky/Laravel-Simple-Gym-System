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
  let columnsArray=[
    {data : 'id'},
    {data : 'name'},
    {data : 'gym.name'},
    {
      data: null,
      render: function(user) 
      {
        console.log(user.id);
          return `<a href="${'/coaches/'+user.id}" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                  <a href="${'/coaches/'+user.id+'/edit'}" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                  <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="${user.id}"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>`;
      }
    }
  ],
    route = "{{ route('coaches.index') }}",
    url = "/coaches/";
</script>
@endsection