@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/checkOut.css') }}">
@endsection
@section('title')
    Checkout
@endsection
@section('main')
    <main id="main">
        @php
            $subtotal = 0;
            $total = 0;
        @endphp
        <section class="checkout">
            <div class="container">
                <div class="checkout-wrapper">
                    <h2 class="checkout-title">Billing Details</h2>
                    <div class="checkout-content">
                        <form action="{{ route('checkout.post') }}" method="POST">
                            <div class="checkout-inputs">
                                <div class="checkout-input">
                                    <label for="firstname">Name<span class="checkout-required">*</span></label>
                                    <input type="text" id="firstname" value="{{Auth::user()->lname}}" name="name" required autofocus />
                                </div>
                                <div class="checkout-input">
                                    <label for="street">Street Address<span class="checkout-required">*</span></label>
                                    <input type="text" id="street" value="{{Auth::user()->address}}" name="address" />
                                </div>
                                <div class="checkout-input">
                                    <label for="phone">Phone Number<span class="checkout-required">*</span></label>
                                    <input type="tel" id="phone" name="phone" />
                                </div>
                                <div class="checkout-input">
                                    <label for="email">Email Address<span class="checkout-required">*</span></label>
                                    <input type="email" id="email" value="{{Auth::user()->email}}" name="email" />
                                </div>
                            </div>
                            @csrf
                            <div class="checkout-details">
                                <div class="checkout-cart">
                                    <div class="checkout-items">
                                        @foreach ($carts as $cart)
                                            @php
                                                $price = $cart->price - ($cart->price / 100) * $cart->sale;
                                                $total = round($price * $cart->quantity, 2);
                                                $subtotal += $total;
                                            @endphp
                                            <div class="checkout-item">
                                                <div class="img">
                                                    <img src="{{ asset($cart->image_link) }}" alt="" />
                                                    <span>{{ $cart->name }}</span>
                                                </div>
                                                <div class="price">${{ $total }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="checkout-cart-total">
                                        <div class="checkout-cart-input">
                                            <label for="cart-total-subtotal">Subtotal:</label>
                                            <input type="text" name="cart-total-subtotal" value="${{ $subtotal }}"
                                                readonly />
                                        </div>
                                        <div class="checkout-cart-input">
                                            <label for="cart-total-shipping">Shipping:</label>
                                            <input type="text" name="cart-total-shipping" value="Free" readonly />
                                        </div>
                                        <div class="checkout-cart-input">
                                            <label for="cart-total-shipping">Total:</label>
                                            <input type="text" name="cart-total-total" value="${{ $subtotal }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="total" value="{{ $subtotal }}">
                                <div class="checkout-options">
                                    <div class="checkout-option">
                                        <input class="checkout-check" type="radio" name="checkout-check" id="checkout-cod"
                                            checked />
                                        <label for="checkout-cod">Cash on delivery</label>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button type="submit" class="red-btn">Place Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
