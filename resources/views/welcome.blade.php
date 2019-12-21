@extends('layouts.master')

@section('content')
<div class="row welcome-page-top">
        <h1 style="color: #193033;">Welcome Back</h1>
    </div>
    <div class="row welcome-page-down">
        @if(!Auth::user())
        <a href="/login" class="btn btn-info login">Login</a>
        <a href="/register" class="btn btn-info">Register</a>
        @else
        @if(Auth::user()->role == 'admin')
        <a href="/dashboard" class="btn btn-info">Back</a>
        @else(Auth::user()->role == 'user')
        <a href="/home" class="btn btn-info">Back</a>
        @endif
        @endif
    </div>
</div>
@endsection
