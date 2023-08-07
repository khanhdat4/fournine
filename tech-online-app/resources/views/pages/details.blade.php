@extends('master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/details.css') }}">
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('title')
    {{ $product->name }}
@endsection
@section('main')
    <main id="main">

        <section class="details mt-5 pt-5">
            <div class="container">
                <div class="details-wrapper">
                    <div class="details-left">
                        <div class="details-small-imgs">
                            @foreach ($img as $item)
                                <div class="details-small-img">
                                    <img class="small-img {{$loop->iteration==1?'opacity-50':''}}" src="{{ asset($item->link) }}" alt="" />
                                </div>
                            @endforeach
                        </div>
                        <div class="details-big-img">
                            <img class="big-img fadein" src="{{ asset($product->image_link) }}" alt="" />
                        </div>
                    </div>
                    <div class="details-right">
                        <div class="item-info">
                            <h2 class="item-name">{{ $product->name }}</h2>
                            <div class="item-ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="item-price">${{ round($product->price - ($product->price / 100) * $product->sale, 2) }}</p>
                            <p class="item-desc">
                                {{ $product->description }}
                            </p>
                        </div>
                        <hr />
                        <form action="{{ route('cart.add') }}" data-id="{{ $product->id }}" class="form-submit"
                            method="post">
                            <div class="item-cart">
                                <div class="item-count-box">
                                    <div class="item-sub item-sign">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <input class="item-count" type="number" id="product-{{ $product->id }}"
                                        name="quantity" value="1" min="1">
                                    <div class="item-add item-sign">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="add" value="1">
                                @csrf
                                <button class="red-btn" type="submit">Add to cart</button>
                            </div>
                        </form>

                        <div class="details-services">
                            <div class="details-service">
                                <div class="service-icon">
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Free Delivery</h3>
                                    <p class="service-desc">
                                        Enter your postal code for Delivery Availability
                                    </p>
                                </div>
                            </div>
                            <div class="details-service">
                                <div class="service-icon">
                                    <i class="fa-solid fa-rotate"></i>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-title">Return Delivery</h3>
                                    <p class="service-desc">
                                        Free 30 Days Delivery Returns. Details
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/addproduct.js') }}"></script>
    <script src="{{ asset('assets/js/detail.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".small-img").on("click", function() {
                $(".small-img").removeClass('opacity-50');
                $(this).addClass('opacity-50');
                $(".big-img").attr('src', $(this).attr('src'));
            });
        });
    </script>
@endsection
