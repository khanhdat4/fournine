@extends('dashboard')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection
@section('title')
    {{ $product->name }} - Edit
@endsection
@section('main')
    <div class="dashboard-box">
        <div class="dashboard-top">
            <div class="dashboard-title">Edit Product</div>
        </div>
        <div class="dashboard-bottom">
            <h3 class="product-infomation">Product infomation</h3>
            <form action="{{ route('admin.product.postedit') }}" method="post" class="product-form product-new" enctype="multipart/form-data">
                <div class="product-input">
                    <label for="product-name">Product Name</label>
                    <input type="text" placeholder="Enter product name" name="name" value="{{ $product->name }}" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Category</label>
                    @php
                        $categories = getCategories();
                    @endphp
                    <select name="category">
                        @foreach ($categories as $item)
                            <option value="{{ $item->name }}"
                                {{ $product->category == Str::lower($item->name) ? 'selected' : '' }}>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" placeholder="Enter product description">{{ $product->description }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Price</label>
                    <input type="text" name="price" placeholder="Enter product price" value="{{ $product->price }}" />
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Sale</label>
                    <input type="text" name="sale" placeholder="Enter product sale" value="{{ $product->sale }}" />
                    @error('sale')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Images</label>
                    <div class="img-input">
                        @foreach ($images as $img)
                            <div class="img-form">
                                <img src="{{ asset($img->link) }}" alt="">
                                <a href="{{route('admin.product.delete.img', ['productId' => $product->id, 'imgId'=>$img->id])}}" class="img-delete"><i class="fa-solid fa-xmark"></i></a>
                            </div>
                        @endforeach
                        <div class="img-form">
                            <label for="files" class="fileupload"><i class="fa-solid fa-plus h1"
                                    style="color: #c2c2c2;"></i></label>
                            <input type="file" name="files[]" multiple="multiple" accept="image/*" style="display: none;"
                                id="files">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="productid" value="{{ $product->id }}">
                @csrf
                <div class="success-btns">
                    <div class="left">
                        <button class="product-new-reset">Cancel</button>
                        <button type="submit" class="red-btn">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
