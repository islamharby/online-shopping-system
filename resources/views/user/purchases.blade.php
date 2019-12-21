@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-12">
            <h3>Invoice</h3>
            <hr>
        </div>
        <div class="col-12" style="margin-bottom: 20px;">
            <div class="row">
                <span class="bill_title">  Name: </span>
                <b> {{$data->user['name']}}</b>
            </div>
            <div class="row">
                <span class="bill_title">  Email:</span>
                <b>{{$data->user['email']}}</b>
            </div>
            <div class="row">
                <span class="bill_title"> No.procurement bill:</span>
                <b>{{$data->No_procurement_bill}}</b>
            </div>
            <div class="row">
                <span class="bill_title">Created at:</span>
                <b>{{$data->created_at}}</b>
            </div>

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
                @foreach($items as $key=> $item)
                <tr>
                    <td>
                    {{++$key}}
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>{{$item->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12">
            <span>Total:</span>
            <h4>{{$total}}</h4>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{asset('js/user/user.js')}}"></script>
@endsection
