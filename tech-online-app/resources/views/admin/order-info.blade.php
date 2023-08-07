@extends('dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endsection
@section('title')
    Order Infomation
@endsection
@section('main')
    <!-- Order list-->
    <div class="dashboard-box">
        <div class="dashboard-top">
            <div class="dashboard-title">Orders</div>
        </div>
        <div class="dashboard-bottom">
            <div class="dashboard-list">
                <h3 class="dashboard-bottom-title">Infomations</h3>
                <table class="list-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->name}}</th>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->total}}</td>
                            <td>
                                @if ($order->status==0)
                                    Unconfirmed
                                @elseif ($order->status==1)
                                    Confirmed
                                @else
                                    Canceled
                                @endif
                            </td>
                            <td class="dashboard-ul">
                                <ul>
                                    <li>
                                        <a class="btn btn-outline-info mb-2" href="{{route('admin.order.detail', ['id' => $order->id])}}">Detail</a>
                                    </li>
                                    <li>
                                        <form action="{{route('admin.order.cancel')}}" method="post">
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Cancel</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

