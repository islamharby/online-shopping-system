@extends('layouts.master')

@section('content')

@include('includes.login-modal')
@include('includes.register-modal')

    <div class="row welcome-page-top">
        <h1 >Welcome Back</h1>
    </div>
    <div class="row welcome-page-down">
        <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-secondary">Login</button>
        <button type="button" data-toggle="modal" data-target="#registerModal" class="btn btn-dark">Register</button>
    </div>
</div>
@endsection
