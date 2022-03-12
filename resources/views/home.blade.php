@extends('layouts.master')

@section('content')


<section class="content home d-flex align-items-center">
    <div class="container ">
        <div class="row ">
            <div class="content">
                <h1 class="text-center h-home  pt-5 fw-bold welcome ">Welcome {{ Auth::user()->name }}</h1>
                <h1 class="text-center h-home mb-5  text-white">Ready to Burn ??</h1>
            </div>
        </div>
    </div>
</section>
@endsection