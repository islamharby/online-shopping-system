@extends('layouts.master')

@section('content')
<form action="POST" id="purchases_form" class="col-12">
    <div class="row">
        <div class="alert alert-danger d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="purchases"  value="{{$item->id}}" id="check{{$item->id}}">
                            <label class="custom-control-label" for="check{{$item->id}}"></label>
                        </div>
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>{{$item->price}}</td>
                    <input type="hidden"name="price"  value="{{$item->price}}">

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row" style="margin-top: 11px;">
            <button type="submit" id="send_form_purchases" class="btn btn-info">Make Order </button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script src="{{asset('js/user/user.js')}}"></script>
@endsection
