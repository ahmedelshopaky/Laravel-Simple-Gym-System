@extends('layouts.datatable')
@section('title')
Training Package 
@endsection


@section('tr')
<th>Name</th>
<th>Sessions Number</th>
<th>Price</th>
<th>Actions</th>
@endsection

@section('script')
<script>
  let col1 = 'name',
    col2 = 'sessions_number',
    col3 = 'price';
    route = "{{ route('training-packages.index') }}",
    url = "/training-packages/";
</script>
@endsection