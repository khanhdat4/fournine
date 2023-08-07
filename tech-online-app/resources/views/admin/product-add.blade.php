@extends('dashboard')
@section('title')
    Add new product
@endsection
@section('main')
    <div class="dashboard-box">
        <div class="dashboard-top">
            <div class="dashboard-title">Add New Product</div>
        </div>
        <div class="dashboard-bottom">
            <h3 class="product-infomation">Product infomation</h3>
            <form action="{{route('admin.product.add')}}" method="POST" class="product-form product-new" enctype="multipart/form-data">
                <div class="product-input">
                    <label for="name">Product Name</label>
                    <input type="text" placeholder="Enter product name" name="name" />
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
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" placeholder="Enter product description"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Images</label>
                    <input name="image[]" type="file" accept="image/*" multiple="multiple" placeholder="Enter product images url">
                </div>
                <div class="product-input">
                    <label for="">Price</label>
                    <input type="text" name="price" placeholder="Enter product price" />
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="">Sale</label>
                    <input type="text" name="sale" placeholder="Enter product sale" />
                    @error('sale')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
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
