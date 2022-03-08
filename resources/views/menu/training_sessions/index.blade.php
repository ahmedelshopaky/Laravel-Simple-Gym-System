@extends('layouts.master')
@section('content')
<div class="wrapper mt-5">
    <!-- Content Wrapper. Contains page content -->
    <div class="">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Training Sessions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped  data-table" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Starts At</th>
                                            <th>Finishes At</th>
                                            <th>Gym</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{-- modal  --}}
                        <div class="modal fade" id="deleteAlert" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-sm modal-notify modal-danger">
                                <div class="modal-content text-center">

                                    <div class="modal-body">
                                        <i class="fas fa-times fa-4x animated rotateIn"></i>
                                        <p class="text-center h3 "> Sure? </p>
                                    </div>
                                    <div class="modal-footer flex-center">
                                        <a  class="btn btn-outline-danger delete_session">Yes</a>
                                        <a type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end of modal --}}

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

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