@extends('layouts.master')

@section('content')
<div class="row col-6">
    <form class="col-12">
        <div class="row">
            <div class="form-group col-9 ">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$item->name}}">
            </div>
            <div class="form-group col-9">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="{{$item->price}}">
            </div>
            <div class="button col-9">
                <button type="button" class="btn btn-primary " id="addBrandBtn">Edit</button>
            </div>
        </div>
    </form>
</div>
@endsection