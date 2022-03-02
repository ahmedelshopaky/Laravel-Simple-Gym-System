@extends('layouts.master')
@section('content')


<section class="content">

    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <img src="/home/aelshopaky/Pictures/blank-profile-picture-973460_1280.png" />
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover yajra-datatable data-table" id="">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$gymManager[0]->user_id}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$gymManager[0]->user->name}}</td>
                                </tr>
                                <tr>

                                    <td>Email</td>
                                    <td>{{$gymManager[0]->user->email}}</td>
                                </tr>
                                <tr>
                                    <td>National ID</td>
                                    <td>{{$gymManager[0]->user->national_id}}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{$gymManager[0]->user->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection