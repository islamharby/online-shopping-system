@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12" style="margin-top: 15px;">
        <h2>Add</h2>
        <hr>
    </div>
    <form class="col-6" id="form_item_add" method="post">
         <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
        <div class="form-group col-12">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Please enter name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group col-12">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Please enter price">
            <span class="text-danger">{{ $errors->first('price') }}</span>
        </div>
      <div class="form-group">
       <button type="submit" id="send_form_add_item" class="btn btn-info">Submit</button>
      </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/admin/admin.js')}}"></script>
@endsection