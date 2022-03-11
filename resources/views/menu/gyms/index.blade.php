@extends('layouts.datatable')

@section('title')
Gyms
@endsection

@section('tr')
<th>ID</th>
<th>Name</th>
<th>City</th> <!-- ADMIN OLNLY -->
<th>Actions</th>
@endsection

@section('script')
<script>
  let columnsArray=[
    {data : 'id'},
    {data : 'name'},
    {data : 'city.name'},
    {
      data: null,
      render: function(gym) 
      {
          
          return `<a href="${'/gyms/'+gym.id}" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                  <a href="${'/gyms/'+gym.id+'/edit'}" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                  <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="${gym.id}"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>`;
      }
    }
  ],
    route = "{{ route('gyms.index') }}",
    url = "/gyms/";
</script>
@endsection