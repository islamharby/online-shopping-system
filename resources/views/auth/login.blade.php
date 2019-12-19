@extends('layouts.master')

@section('content')
<div class="row">
    <a href="/register" class="btn btn-primary" style="margin: 7% 6% 2% 14%;">Register</a>
</div>
<div class="row form-login col-6">
    <form class="col-12" method="POST" action="/api/login">
    {{csrf_field()}}
        <div class="row">
        <div class="col-12">
            @if(session()->exists('errors'))
            <div class="alert alert-danger">
                @foreach(session()->get('errors', []) as $k => $v)
                    @foreach($v as $x => $y)
                    <p>{{ $k }} : {{ $y }}</p>
                    @endforeach
                @endforeach
            </div>    
            @endif
            <div class="form-group col-9 ">
            <label  for="email">Email</label>
                <input type="text" class="form-control email" name="email" id="email" required>
                <span class="validationMsg"></span>

            </div>
            <div class="form-group col-9">
                <label for="password">Password</label>
                <input type="password" class="form-control password"  id="password" name="password" required>
                <span class="validationMsg"></span>

            </div>
            <div class="button col-9">
                <button  class="btn btn-primary  valid-submit">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection
