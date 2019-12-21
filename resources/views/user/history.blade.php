@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No.procurement bill</th>
                <th scope="col">Total</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=> $item)
            <tr>
                <td>
                {{++$key}}
                </td>
                <td>
                    {{$item['No_procurement_bill']}}
                </td>
                <td>
                    {{$item['total']}}
                </td>
                <td>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item['purchases_items'] as $purchases_item_one)
                            <tr>
                                <td> 
                                    {{$purchases_item_one['name']}}
                                </td>
                                <td> 
                                    {{$purchases_item_one['price']}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
<script src="{{asset('js/user/user.js')}}"></script>
@endsection
