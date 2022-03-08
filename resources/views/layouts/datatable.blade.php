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
                            <div class="card-header">
                                <h3 class="card-title">@yield('title')</h3>
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

@yield('script')
@endsection