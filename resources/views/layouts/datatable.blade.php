@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/css/app.css')}}">

<div class="wrapper mt-5">
    <!-- Content Wrapper. Contains page content -->
    <div class="">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-4">
                                <h3 class="card-title text-white fs-3">@yield('title')</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped  dtr-inline table-hover data-table w-100" id="">
                                    <thead>
                                        <tr>
                                            @yield('tr')
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
                                        <a class="btn btn-outline-danger _delete">Yes</a>
                                        <a type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end of modal --}}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


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
            ajax: route,
            columns: [{
                    data: col1,
                },
                {
                    data: col2,
                },
                {
                    data: col3,
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                // {
                //     data: null,
                //     render: function() {
                //         return `<a href="' . route('city-managers.show', $user->user_id) . '" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>
                //                 <a href="' . route('city-managers.edit', $user->user_id) . '" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>
                //                 <a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $user->user_id . '  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>`;
                //     }

                // },
            ]
        });
        var id;
        $('body').on('click', '.delete', function() {
            id = $(this).data("id");
            $('body').on('click', '._delete', (event) => {
                $.ajax({
                    url: url + id,
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
        let gymManagerId;
        $('body').on('click', '.ban', function() {
            gymManagerId = $(this).data("id");
            $.ajax({
                url: "/gym-managers/ban/" + gymManagerId,
                type: "PUT",
                async: false,
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: (response) => {
                    table.ajax.reload();
                }
            });

        });
        $('body').on('click', '.unban', function() {
            gymManagerId = $(this).data("id");
            $.ajax({
                url: "/gym-managers/unban/" + gymManagerId,
                type: "PUT",
                async: false,
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: (response) => {
                    table.ajax.reload();
                }
            });
        });
    });
</script>

@yield('script')
@endsection