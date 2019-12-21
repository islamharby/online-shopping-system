@extends('layouts.master')

@section('content')

    <a href="/register" class="btn btn-info form_back">Register</a>

    <h2 class="form_title">Login</h2>
    <hr>
    <form id="login_form" method="post">
         <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
        <div class="form-group col-12">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group col-12">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Please enter password">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
      <div class="form-group">
       <button type="submit" id="send_form_login" class="btn btn-info">Submit</button>
      </div>
    </form>
@endsection
@section('scripts')
<script src="{{asset('js/auth/auth.js')}}"></script>
@endsection