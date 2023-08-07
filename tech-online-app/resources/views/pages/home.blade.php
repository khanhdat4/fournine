@extends('master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title')
    Home Page
@endsection
@section('main')
    <main id="main">
        <section class="banner">
            <div class="">
                <div id="carouselBanner" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item banner-item active" data-bs-interval="10000">
                            <img src="{{ asset('images/banner-1.png') }}" class="d-block w-100" alt="..." />
                            <div class="carousel-caption banner-content text-end">
                                <h5 class="banner-title">Welcome to 49e</h5>
                                <p class="banner-desc">
                                    Some representative placeholder content for the first slide.
                                </p>
                                <button class="red-btn"><a href="{{route('product')}}">Shop now</a></button>
                            </div>
                        </div>
                        <div class="carousel-item banner-item" data-bs-interval="2000">
                            <img src="{{ asset('images/banner-2.png') }}" class="d-block w-100" alt="..." />
                            <div class="carousel-caption banner-content text-center">
                                <h5 class="banner-title">Welcome to 49e</h5>
                                <p class="banner-desc">
                                    Some representative placeholder content for the first slide.
                                </p>
                                <button class="red-btn"><a href="{{route('product')}}">Shop now</a></button>
                            </div>
                        </div>
                        <div class="carousel-item banner-item">
                            <img src="{{ asset('images/banner-3.png') }}" class="d-block w-100" alt="..." />
                            <div class="carousel-caption banner-content text-start">
                                <h5 class="banner-title">Welcome to 49e</h5>
                                <p class="banner-desc">
                                    Some representative placeholder content for the first slide.
                                </p>
                                <button class="red-btn"><a href="{{route('product')}}">Shop now</a></button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev carousel-btn" type="button" data-bs-target="#carouselBanner"
                        data-bs-slide="prev">
                        <span class=""><i class="fa-solid fa-caret-left"></i></span>
                    </button>
                    <button class="carousel-control-next carousel-btn" type="button" data-bs-target="#carouselBanner"
                        data-bs-slide="next">
                        <span class=""><i class="fa-solid fa-caret-right"></i></span>
                    </button>
                </div>
            </div>
        </section>

        <section class="best background">
            <div class="container">
                <div class="heading">
                    <div class="heading-icon"></div>
                    <h3 class="heading-title">All times</h3>
                </div>
                <h2 class="title">Best Sellings</h2>
                <div class="wrapper">
                    <div class="best-products">
                        {{-- sales product --}}
                        @foreach ($sales as $item)
                            <x-product :id="$item->id" :name="$item->name" :price="$item->price" :description="$item->description"
                                :sale="$item->sale" :category="$item->category" :imagelink="$item->image_link" />
                        @endforeach
                        {{-- end sales product --}}
                    </div>
                </div>
                <div class="view-all">
                    <button class="red-btn">
                        <a href="{{route('product')}}">View All Products</a>
                    </button>
                </div>
            </div>
        </section>
        <section class="cate background">
            <div class="container">
                <div class="heading">
                    <div class="heading-icon"></div>
                    <h3 class="heading-title">Categories</h3>
                </div>
                <h2 class="title">Our Categories</h2>
                <div class="wrapper row row-cols-2 row-cols-md-3 row-cols-lg-6">
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'Phone'])}}" class="cate-box">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <span>Phones</span>
                        </a>
                    </div>
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'Computer'])}}" class="cate-box">
                            <i class="fa-solid fa-computer"></i>
                            <span>Computers</span>
                        </a>
                    </div>
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'SmartWatch'])}}" class="cate-box">
                            <i class="fa-regular fa-clock"></i>
                            <span>SmartWatch</span>
                        </a>
                    </div>
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'Camera'])}}" class="cate-box">
                            <i class="fa-solid fa-camera"></i>
                            <span>Camera</span>
                        </a>
                    </div>
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'HeadPhones'])}}" class="cate-box">
                            <i class="fa-solid fa-headphones"></i>
                            <span>HeadPhones</span>
                        </a>
                    </div>
                    <div class="col cate-box-wrapper">
                        <a href="{{route('product', ['category' => 'Gaming'])}}" class="cate-box">
                            <i class="fa-solid fa-gamepad"></i>
                            <span>Gaming</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="products background">
            <div class="container">
                <div class="heading">
                    <div class="heading-icon"></div>
                    <h3 class="heading-title">Our Products</h3>
                </div>
                <h2 class="title">Explore Our Products</h2>
                <div class="wrapper row row-cols-1 row-cols-md-2 row-cols-lg-4">
                    @foreach ($products as $item)
                        <div class="col">
                            <x-product :id="$item->id" :name="$item->name" :price="$item->price" :description="$item->description"
                                :sale="$item->sale" :category="$item->category" :imagelink="$item->image_link" />
                        </div>
                    @endforeach

                </div>
                <div class="view-all">
                    <button class="red-btn">
                        <a href="{{route('product')}}">View All Products</a>
                    </button>
                </div>
            </div>
        </section>

        <section class="featured">
            <div class="container">
                <div class="heading">
                    <div class="heading-icon"></div>
                    <h3 class="heading-title">Featured</h3>
                </div>
                <h2 class="title">New Arrival</h2>
                <div class="wrapper row row-cols-1 row-cols-lg-2">
                    <div class="col lg-col">
                        <div class="featured-box">
                            <div class="featured-img">
                                <img src="{{ asset('images/Computers-1-a.png-removebg-preview.png') }}" alt="" />
                            </div>
                            <div class="featured-content">
                                <h3>
                                    Newest Upgraded Ideapad 1 Laptops for Student & Business by
                                    Lenovo
                                </h3>
                                <a href="{{route('product')}}">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-right">
                        <div class="featured-box col-right-top">
                            <div class="featured-img">
                                <img src="{{ asset('images/Gaming-3-a-removebg-preview.png') }}" alt="" />
                            </div>
                            <div class="featured-content">
                                <h3>ZOTAC Gaming MEK Hero G1 I1416FV Gaming PC Desktop</h3>
                                <a href="{{route('product')}}">Shop now</a>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col lg-col">
                                <div class="featured-box">
                                    <div class="featured-img">
                                        <img src="{{ asset('images/Headphones-1-a-removebg-preview.png') }}"
                                            alt="" />
                                    </div>
                                    <div class="featured-content">
                                        <h3>Technics Wireless Noise Cancelling Headphones</h3>
                                        <a href="{{route('product')}}">Shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col lg-col">
                                <div class="featured-box">
                                    <div class="featured-img">
                                        <img src="{{ asset('images/Smartwatch-1-a.png-removebg-preview.png') }}"
                                            alt="" />
                                    </div>
                                    <div class="featured-content">
                                        <h3>SAMSUNG Galaxy Watch Pro 5 45mm LTE Smartwatch</h3>
                                        <a href="{{route('product')}}">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service">
            <div class="container">
                <div class="wrapper">
                    <div class="service-item">
                        <div class="icon-circle service-icon">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <div class="service-content">
                            <div class="service-title">FREE AND FAST DELIVERY</div>
                            <div class="service-desc">
                                Free delivery for all orders over $140
                            </div>
                        </div>
                    </div>
                    <div class="service-item">
                        <div class="icon-circle service-icon">
                            <i class="fa-solid fa-headphones"></i>
                        </div>
                        <div class="service-content">
                            <div class="service-title">24/7 CUSTOMER SERVICE</div>
                            <div class="service-desc">Friendly 24/7 customer support</div>
                        </div>
                    </div>
                    <div class="service-item">
                        <div class="icon-circle service-icon">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <div class="service-content">
                            <div class="service-title">MONEY BACK GUARANTEE</div>
                            <div class="service-desc">We reurn money within 30 days</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{ asset('assets/js/addproduct.js') }}"></script>
@endsection
