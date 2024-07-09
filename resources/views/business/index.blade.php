@extends('layouts.index-pages')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <img class="loginImg img-fluid" src="{{ asset('assets/img/skedclock_02.png') }}" alt="">
            <h4>Log in with your MSABS-BUSINESS account to continue</h4>
            <div class="auth-form">
                <a class="btn btn-primary" href="{{ route('business-login') }}">Login</a>
            </div>
        </div>
        <div class="col-md-6">
            <img class="BGImage img-fluid" src="{{ asset('assets/img/BG_test.png') }}" alt="">
        </div>
    </div>
</div>

@endsection
