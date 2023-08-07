@extends('master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
@endsection
@section('title')
    Product
@endsection
@section('main')
    <main id="main">
        <section class="shop mt-4">
            <div class="container">
                <div class="shop-wrapper row">
                    <div class="shop-menu col-md-3">
                        <h2 class="shop-menu-title">Hot Deals</h2>
                        <ul class="nav nav-pills shop-menu-nav" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ request()->get('category') ? '' : 'active' }}"
                                    href="{{ route('product') }}">All</a>
                            </li>
                            @php
                                $categories = getCategories();
                            @endphp
                            @foreach ($categories as $category)
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link
                                    {{ request()->get('category') == $category->name ? 'active' : '' }}"
                                        href="{{ route('product', [
                                            'category' => $category->name,
                                            'search' => request()->search,
                                            'sortBy' => request()->sortBy,
                                            'sortType' => request()->sortType,
                                        ]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shop-details col-md-9">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                                aria-labelledby="pills-all-tab" tabindex="0">
                                <div class="shop-detail">
                                    <div class="shop-detail-top">
                                        <div class="shop-detail-top-right">
                                            <select onchange="location = this.value">
                                                <option selected="true" disabled="disabled">
                                                    Soft by
                                                </option>
                                                <option
                                                    value="{{ route('product', [
                                                        'category' => request()->category,
                                                        'search' => request()->search,
                                                        'sortBy' => 'price',
                                                        'sortType' => 'asc',
                                                    ]) }}">
                                                    Price - Low to High</option>
                                                <option
                                                    value="{{ route('product', [
                                                        'category' => request()->category,
                                                        'search' => request()->search,
                                                        'sortBy' => 'price',
                                                        'sortType' => 'desc',
                                                    ]) }}">
                                                    Price - High to Low</option>
                                                <option
                                                    value="{{ route('product', [
                                                        'category' => request()->category,
                                                        'search' => request()->search,
                                                        'sortBy' => 'name',
                                                        'sortType' => 'asc',
                                                    ]) }}">
                                                    Name - A to Z</option>
                                                <option
                                                    value="{{ route('product', [
                                                        'category' => request()->category,
                                                        'search' => request()->search,
                                                        'sortBy' => 'name',
                                                        'sortType' => 'desc',
                                                    ]) }}">
                                                    Name - Z to A</option>

                                            </select>
                                        </div>
                                    </div>
                                    @if ($products->count() == 0)
                                        <p class="h5">No products found</p>
                                    @else
                                        <div class="shop-detail-bottom row row-cols-1 row-cols-md-2 row-cols-lg-4">

                                            @foreach ($products as $item)
                                                <div class="col">
                                                    <x-product :id="$item->id" :name="$item->name" :price="$item->price"
                                                        :description="$item->description" :sale="$item->sale" :category="$item->category"
                                                        :imagelink="$item->image_link" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            {{ $products->links() }}
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

