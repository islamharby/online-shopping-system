@extends('layouts.master')

@section('content')
<div class="row ">
    <div class="col-12" style="margin-top: 15px;">
        <h2>Update</h2>
        <hr>
    </div>
    <form class="col-6" id="form_item_edit" method="post">

         <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
         <input type="hidden" name="id"  value="{{$item->id}}">
        <div class="form-group col-12">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$item->name}}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group col-12">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" value="{{$item->price}}">
            <span class="text-danger">{{ $errors->first('price') }}</span>
        </div>
      <div class="form-group">
       <button type="submit" id="send_form_edit_item" class="btn btn-info">Submit</button>
      </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/admin/admin.js')}}"></script>
@endsection