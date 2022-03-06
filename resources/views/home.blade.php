@extends('layouts.master')

@section('content')
<section class="content mt-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</section >
@endsection
