@extends('dashboard')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title')
    Product Information
@endsection
@section('main')
    <div class="tab-pane fade show active" id="v-pills-product-info" role="tabpanel" aria-labelledby="v-pills-product-info-tab"
        tabindex="0">
        <div class="dashboard-box">
            <div class="dashboard-top">
                <div class="dashboard-title">Products</div>
                <div class="dashboard-search">
                    <form action="{{route('admin.product.info')}}" method="get">
                        <input class="product-search" name="search" id="search" type="text" placeholder="Enter Product Name" value="{{request()->search}}" />
                    </form>
                </div>
            </div>
            <div class="dashboard-bottom">
                <div class="dashboard-list">
                    <h3 class="dashboard-bottom-title">Infomations</h3>
                    <table class="list-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td class="dashboard-info-desc">
                                        <div>
                                            {{ $product->description }}
                                        </div>
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        <a class="btn btn-info mb-2" href="{{route('admin.product.getedit', ['id'=>$product->id])}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('admin.product.delete', ['id' => $product->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
