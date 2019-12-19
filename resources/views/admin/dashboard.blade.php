@extends('layouts.master')

@section('content')
<form action="" class="col-12">
    {{csrf_field()}}
    <div class="row">
        <div class="row" style="margin-top: 11px;">
            <a href="/Item/add"  class="btn btn-info"> Add </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                    <div class="options-container">
                            <a href="/Item/edit/{{$item->id}}" class="btn btn-info">
                                <span>Edit</span>
                            </a>
                            <a href="/Item/edit/{{$item->id}}"  class="btn btn-danger">
                                <span>Delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
@endsection
