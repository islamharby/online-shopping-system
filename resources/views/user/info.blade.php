@extends('layouts.master')

@section('content')
    <h2 class="form_title">Update Info</h2>
    <hr>

    <form id="update_from" method="post">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
        </div>
        <div class="row col-9">
            <h4> Master Card Info : </h4>
        </div>
        <hr>
        <div class="form-group col-6 ">
          <label for="card_name">Card Name*</label>
          <input type="text" name="card_name" class="form-control" id="card_name" value="{{$data->card_name}}" >
        </div>
        <div class="form-group col-6">
          <label for="card_type">Card Type* : </label>
          <br>
          <input type="radio" name="card_type" id="card_type" {{ $data->card_type == "visa" ? "checked" : " " }} value="visa" style=" margin-right: 5px;"> Visa Card
          <input type="radio" name="card_type" id="card_type" {{ $data->card_type == "master" ? "checked" : " " }} value="master" style="margin-left: 26px; margin-right: 5px;"> Master Card
        </div>
        <div class="form-group col-7 ">
          <label for="card_number">Card Number*</label>
          <input type="text" name="card_number" class="form-control" id="card_number" value="{{$data->card_number}}" >
        </div>
        <div class="form-group col-1 " style="margin: 0px;float: left;">
          <label for="date_month">Date Month*</label>
          <input type="text" name="date_month" class="form-control" id="date_month" maxlength="2" value="{{$data->date_month}}">
        </div>
        <div class="form-group col-1"  style="margin: 0px;float: left;">
          <label for="date_year">Date Year*</label>
          <input type="text" name="date_year" class="form-control" id="date_year" maxlength="2" value="{{$data->date_year}}">
        </div>
        <div class="form-group col-1"  style="margin: 0px;float: left;">
          <label for="cvc">CVC*</label>
          <input type="text" name="cvc" class="form-control" id="cvc" maxlength="3" value="{{$data->cvc}}">
        </div>
        <div class="form-group col-12" style="margin-top: 173px;text-align: center;">
        <button type="submit" id="send_form_update_info" class="btn btn-info">Submit</button>
        </div>
    </form>
    @endsection
    @section('scripts')
    <script src="{{asset('js/user/user.js')}}"></script>
    @endsection