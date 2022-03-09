@extends('layouts.datatable')
@section('title')
Training Session
@endsection


@section('tr')
<th>ID</th>
<th>Name</th>
<th>Starts At</th>
<th>Finishes At</th>
<th>Gym</th>
<th>Actions</th>

@endsection

@section('script')



<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('training-sessions.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'starts_at',
                    name: 'starts_at'
                },
                {
                    data: 'finishes_at',
                    name: 'finishs_at'
                },
                {
                    data: 'gym.name',
                    name: 'gym.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        var id;
        $('body').on('click', '.delete', function() {
            id = $(this).data("id");
            $('body').on('click', '.delete_session', (event) => {
                $.ajax({
                    url: "/training-sessions/" + id,
                    type: "DELETE",
                    async: false,
                    data: {
                        _token: '{!! csrf_token() !!}',
                    },
                    success: (response) => {
                        $('#deleteAlert').modal('hide');
                        table.ajax.reload();
                    }
                });
            });
        });
    });
</script>
@endsection