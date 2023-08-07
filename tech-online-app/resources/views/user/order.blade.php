@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@endsection
@section('title')
    My Orders
@endsection
@section('main')
    <main id="main">
        <section class="account">
            <div class="container d-flex">
                <div class="left-account">
                    <nav aria-label="breadcrumb">
                    <aside class="sidebar">
                            <h3 class="menu-heading mb-2"><a  href="{{route('user.show')}}">Manage My Account</a></h3>

                            <h3 class="menu-heading mb-2"><a class="text-danger" href="{{route('user.order')}}">My Orders</a></h3>
                    </aside>
                </div>
                <div class="right-account">
                    <div class="right-box">
                        <h2 class="right-heading">My orders</h2>
                        <div class="container pt-2">
                            @foreach ($orders as $order)
                                <div class="d-flex justify-content-start align-items-center w-100 pt-2 pb-2 mb-2 bg-light ps-1">
                                    <span class="pe-2">Order id: {{$order->id}}</span>
                                    <span class="pe-2">Total: {{$order->total}}</span>
                                    @php
                                        $timestamp = strtotime($order->created_at);
                                    @endphp
                                    <span class="pe-2">Order date: {{date('Y-m-d', $timestamp)}}</span>
                                    <span class="pe-2">Status: @if ($order->status == 0) Unconfirmed @elseif($order->status == 1) Confirmed @else Canceled @endif</span>
                                    <span><a class="text-danger" href="{{route('user.order.detail', ['id' => $order->id])}}">Detail</a></span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
