@extends('master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <style>
        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
    </style>
@endsection
@section('title')
    Cart
@endsection
@section('main')
    @php
        $total = 0;
        $subtotal = 0;
    @endphp
    <main id="main">
        <section class="cart">
            <div class="container">
                <div class="cart-list">
                    <div class="cart-header">
                        <span>Product </span>
                        <span>Price</span>
                        <span>Quantity</span>
                        <span>Subtotal</span>
                    </div>
                    @foreach ($carts as $cart)
                        @php
                            $price = $cart->price - $cart->price/100*$cart->sale;
                            $total = round($price * $cart->quantity, 2);
                            $subtotal += $total;
                        @endphp
                        <div class="cart-item">
                            <div class="item-desc">
                                <img src="{{ asset($cart->image_link) }}" alt="" /><span
                                    class="item-name">{{ $cart->name }}</span>
                            </div>
                            <div class="item-price" >
                                $<span id="item-price-{{$cart->id}}" data-price="{{$price}}">{{ round($price, 2) }}</span>
                            </div>
                            <div class="item-quantity">
                                <div class="wrapper">
                                    {{-- <span class="quantity update" data-id="{{ $cart->id }}">{{ $cart->quantity }}</span> --}}
                                    <input type="number" class="update" name="quantity" id="{{ $cart->id }}"
                                        value="{{ $cart->quantity }}" style="border: none; width:50px">
                                    <div class="item-btn">
                                        <button class="item-up" data-id="{{$cart->id}}">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </button>
                                        <button class="item-down" data-id="{{$cart->id}}">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="item-subtotal" >
                                $<span id="item-subtotal-{{$cart->id}}">{{ $total, 2 }}</span>
                            </div>
                            <div class="item-remove"><a href="{{ route('cart.remove', ['id' => $cart->id]) }}"><i
                                        class="fa-solid fa-xmark"></i></a></div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-desc">
                    <div class="cart-return">
                        <button class="white-btn"><a href="{{route('product')}}">Return To Shop</a></button>
                    </div>
                    <div class="cart-total">
                        <form action="{{route('checkout.show')}}" method="post">
                            <h3 class="cart-total-title">Cart Total</h3>
                            <div class="cart-input">
                                <label for="cart-total-subtotal">Subtotal:</label>
                                <input type="text" name="cart-total-subtotal" value="${{ $subtotal }}" readonly />
                            </div>
                            <div class="cart-input">
                                <label for="cart-total-shipping">Shipping:</label>
                                <input type="text" name="cart-total-shipping" value="Free" readonly />
                            </div>
                            <div class="cart-input">
                                <label for="cart-total-shipping">Total:</label>
                                <input type="text" name="cart-total-subtotal" value="${{ $subtotal }}" readonly />
                            </div>
                            @csrf
                            <button class="red-btn" >
                                Procees to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('.item-up').on("click", function(){
                var id = $(this).attr("data-id")
                var currentNum = $('#' + id).val();
                $('#' + id).val(Number(currentNum) + 1).trigger('change')
            })

            $('.item-down').on("click", function(){
                var id = $(this).attr("data-id")
                var currentNum = $('#' + id).val();
                $('#' + id).val(Number(currentNum) - 1).trigger('change')
            })

            //AJAX change product quantity
            $(document).on("change", ".update", function() {
                var edit_id = $(this).attr('id');
                var quantity = $(this).val();
                var price = $("#item-price-" + edit_id).attr('data-price');
                console.log(edit_id, price, quantity);
                if (quantity > 0) {
                    $.ajax({
                        url: 'cart-update',
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            id: edit_id,
                            quantity: quantity
                        },
                        success: function(response) {
                            $('[name="cart-total-subtotal"]').val('$' + response.subtotal.toFixed(2));
                            $('#item-subtotal-'+edit_id).text((quantity * price).toFixed(2));
                            setTime('modal-success');
                        },
                        error: function(){
                            setTime('modal-error');
                        }
                    });
                } else {
                    alert('Invalid field');
                }
            });
        })
    </script>
@endsection
