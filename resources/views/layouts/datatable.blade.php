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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    class="table table-bordered table-striped  dtr-inline table-hover data-table w-100"
                                    id="">
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

                        {{-- modal --}}
                        <div class="modal fade" id="deleteAlert" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-sm modal-notify modal-danger">
                                <div class="modal-content text-center">

                                    <div class="modal-body">
                                        <i class="fas fa-times fa-3x animated rotateIn"></i>
                                        <p class="text-center h3 "> Are you Sure? </p>
                                    </div>
                                    <div class="modal-footer flex-center">
                                        <a class="btn btn-outline-danger _delete">Yes</a>
                                        <a type="button" class="btn btn-danger waves-effect"
                                            data-bs-dismiss="modal">No</a>
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
    var Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
        });
    var check;
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var table = $('.data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'data to excel',
                    exportOptions: {
                        columns: [ 0,1,2 ],
                            modifier: {
                                page: 'current'
                            }
                        }
                }
            ],
            processing: true,
            serverSide: true,
            ajax: route,
            columns: columnsArray,
            
        });
        var id;
        $('body').on('click', '.delete', function() {
            id = $(this).data("id");
            $('body').one('click', '._delete',function (event) {
                
                $.ajax({
                    url: url + id,
                    type: "DELETE",
                    async: false,
                    data: {
                        _token: '{!! csrf_token() !!}',
                    },
                    success: (response) => {
                        $('#deleteAlert').modal('hide');
                        Toast.fire({
                            icon: response.message  ? "success" : "error", 
                            title: response.message ? "this row deleted Successfully":"Sorry Can't delete this Row right Now",
                        });
                        table.ajax.reload();
                
                    }
                });
            });
        });
        let gymManagerId;
        $('body').on('click', '.ban', function() {
            gymManagerId = $(this).data("id");
            $.ajax({
                url: "/users/ban/" + gymManagerId,
                type: "PUT",
                async: false,
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: (response) => {
                    Toast.fire({
                            icon:  response.message  ? "success" : "error",
                            title: response.message ? "You Banned This Manager Successfully":"Sorry Can't Ban This User",
                        });
                    table.ajax.reload();
                }
            });

        });
        $('body').on('click', '.unban', function() {
            gymManagerId = $(this).data("id");
            $.ajax({
                url: "/users/unban/" + gymManagerId,
                type: "PUT",
                async: false,
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: (response) => {
                    Toast.fire({
                            icon: response.message  ? "success" : "error",
                            title: response.message ? "You UnBanned This Manager Successfully":"Sorry can't unban this User",
                        });
                    table.ajax.reload();
                }
            });
        });
    });
</script>
@if($errors->any())
    <script>
        $(function() {
            Toast.fire({
                icon: "warning",
                title: "sorry can\'t edit running session",
            });
    });
    </script>
@endif
@yield('script')
@endsection