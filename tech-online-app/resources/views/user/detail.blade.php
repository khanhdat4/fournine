@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
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
                                <div class="d-flex justify-content-start align-items-center w-100 mb-3 pt-2 pb-2 bg-light ps-1">
                                    <span class="pe-2">Order id: {{$order->id}}</span>
                                    <span class="pe-2">Total: {{$order->total}}</span>
                                    @php
                                        $timestamp = strtotime($order->created_at);
                                    @endphp
                                    <span class="pe-2">Order date: {{date('Y-m-d', $timestamp)}}</span>
                                    <span class="pe-2">Status: @if ($order->status == 0) Unconfirmed @elseif($order->status == 1) Confirmed @else Canceled @endif</span>
                                    @if ($order->status == 0)
                                    <form action="{{route('user.order.cancel', ['id'=>$order->id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="cart-list">
                                    <div class="cart-header">
                                        <span>Product </span>
                                        <span>Price</span>
                                        <span>Quantity</span>
                                        <span>Subtotal</span>
                                    </div>
                                    @foreach ($listCart as $cart)
                                        @php
                                            $price = $cart->price - $cart->price/100*$cart->sale;
                                            $total = round($price * $cart->quantity, 2);
                                        @endphp
                                        <div class="cart-item">
                                            <div class="item-desc">
                                                <img src="{{ asset($cart->image_link) }}" alt="" />
                                                <span class="item-name">{{ $cart->name }}</span>
                                            </div>
                                            <div class="item-price" >
                                                $<span id="item-price-{{$cart->id}}" data-price="{{$price}}">{{ round($price, 2) }}</span>
                                            </div>
                                            <div class="item-quantity">
                                                    <span>{{$cart->quantity}}</span>
                                            </div>
                                            <div class="item-subtotal" >
                                                $<span id="item-subtotal-{{$cart->id}}">{{ $total, 2 }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
