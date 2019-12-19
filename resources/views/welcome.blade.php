@extends('layouts.master')

@section('content')
    <div class="row welcome-page-top">
        <h1 style="color: #193033;">Welcome Back</h1>
    </div>
    <div class="row welcome-page-down">
        <a href="/login" class="btn btn-info login">Login</a>
        <a href="/register" class="btn btn-info">Register</a>
    </div>
</div>
@endsection
