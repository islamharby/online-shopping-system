@extends('layouts.master')

@section('content')
<form action="" class="col-12">
    {{csrf_field()}}
    <div class="row">
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
                            <input type="checkbox" class="custom-control-input" name="select-checkbox" id="check{{$item->id}}">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <label class="custom-control-label" for="check{{$item->id}}"></label>
                        </div>
                    </td>   
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row" style="margin-top: 11px;">
            <button class="btn btn-info"> Buy </button>
        </div>
    </div>
</form>
@endsection
