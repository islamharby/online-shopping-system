@extends('layouts.master')

@section('content')
<div class="row">
    <a href="/login" class="btn btn-primary" style="margin: 1% 6% 2% 14%;">login</a>
</div>
<div class="row form-login col-6">
    <form class="col-12" id="adminSigninForm" method="POST">
        <div class="row">
            <div class="form-group col-9 ">
                <label>Name</label>
                <input type="text" class="form-control" name="user_name">
            </div>
            <div class="form-group col-9 ">
                <label>Email</label>
                <input type="text" class="form-control" id="adminSigninEmail" name="email">
            </div>
            <div class="form-group col-6">
                <label>Password</label>
                <input type="password" class="form-control" id="adminSigninPassword" name="password">
            </div>
            <div class="form-group col-6 ">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number">
            </div>
            <div class="row col-9">
               <h2> Master Card Info : </h2>
            </div>
            <div class="row">
                <div class="form-group col-6 ">
                    <label>Card Name</label>
                    <input type="text" class="form-control" name="card_name">
                </div>
                <div class="form-group col-9">
                    <label>Card Type : </label>
                    <div class="row card_type" style="    margin-left: 74px;">
                        <input type="radio" name="card_type" value="visa" style=" margin-right: 5px;"> Visa Card
                        <input type="radio" name="card_type" value="master" style="margin-left: 26px; margin-right: 5px;"> Master Card
                    </div>
                </div>
                <div class="form-group col-10">
                    <label>Card Number</label>
                    <input type="text" class="form-control" name="card_number">
                </div>
                <div class="form-group col-3 ">
                    <label>Date Month</label>
                    <input type="text" class="form-control" name="date_month">
                </div>
                <div class="form-group col-3 ">
                    <label>Date Year</label>
                    <input type="text" class="form-control" name="date_year">
                </div>
                <div class="form-group col-3  margin-top: 26px;">
                    <label>CVC</label>
                    <input type="text" class="form-control" name="cvc">
                </div>
            </div>
            <div class="button col-9">
                <button type="submit" class="btn btn-primary " id="addBrandBtn">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection
