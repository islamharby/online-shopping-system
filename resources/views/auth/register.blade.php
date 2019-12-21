@extends('layouts.master')

@section('content')
    <a href="/login" class="btn btn-info form_back">Login</a>

    <h2 class="form_title">Register</h2>
    <hr>

    <form id="register_from" method="post">
        <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
        </div>
        <div class="form-group col-6">
          <label for="name">Name*</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Please enter name">
          <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group col-6">
          <label for="email">Email* </label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email ">
          <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group col-6">
          <label for="password">Password*</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Please enter password">
          <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group col-6">
          <label for="phone_number">Phone Number*</label>
          <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Please enter phone number">
          <span class="text-danger">{{ $errors->first('phone_number') }}</span>
        </div>
        <div class="row col-9">
            <h2> Master Card Info : </h2>
        </div>
        <hr>
        <div class="form-group col-6 ">
          <label for="card_name">Card Name</label>
          <input type="text" name="card_name" class="form-control" id="card_name" placeholder="Please enter card name" >
          <span class="text-danger">{{ $errors->first('card_name') }}</span>
        </div>
        <div class="form-group col-6">
          <label for="card_type">Card Type : </label>
          <br>
          <input type="radio" name="card_type" id="card_type" value="visa" style=" margin-right: 5px;"> Visa Card
          <input type="radio" name="card_type" id="card_type" value="master" style="margin-left: 26px; margin-right: 5px;"> Master Card
        </div>
        <div class="form-group col-7 ">
          <label for="card_number">Card Number</label>
          <input type="text" name="card_number" class="form-control" id="card_number" placeholder="Please enter card number" >
          <span class="text-danger">{{ $errors->first('card_number') }}</span>
        </div>
        <div class="form-group col-1 ">
          <label for="date_month">Date Month</label>
          <input type="text" name="date_month" class="form-control" id="date_month" maxlength="2">
          <span class="text-danger">{{ $errors->first('date_month') }}</span>
        </div>
        <div class="form-group col-1 date_year">
          <label for="date_year">Date Year</label>
          <input type="text" name="date_year" class="form-control" id="date_year" maxlength="2">
          <span class="text-danger">{{ $errors->first('date_year') }}</span>
        </div>
        <div class="form-group col-1 cvc_div" >
          <label for="cvc">CVC</label>
          <input type="text" name="cvc" class="form-control" id="cvc" maxlength="3">
          <span class="text-danger">{{ $errors->first('cvc') }}</span>
        </div>
        <div class="form-group col-12">
        <button type="submit" id="send_form_register" class="btn btn-info">Submit</button>
        </div>
    </form>
    @endsection
    @section('scripts')
    <script src="{{asset('js/auth/auth.js')}}"></script>
    @endsection