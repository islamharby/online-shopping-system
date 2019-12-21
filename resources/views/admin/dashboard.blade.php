@extends('layouts.master')

@section('content')
<form action="" class="col-12">
    {{csrf_field()}}
    <div class="row">
        <div class="row" style="margin: 11px;">
            <a href="/Item/create"  class="btn btn-info"> Add </a>
        </div>
        @if(session()->exists('error'))
            <div class="col-12 alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->exists('success'))
            <div class=" col-12 alert alert-success">
                {{ session()->get('success') }}
            </div>    
        @endif
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
                            <a href="/Item/delete/{{$item->id}}"  class="btn btn-danger">
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
@section('scripts')
<script src="{{asset('js/admin/admin.js')}}"></script>
@endsection