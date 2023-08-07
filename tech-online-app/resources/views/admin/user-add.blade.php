@extends('dashboard')
@section('title')
    Add new user
@endsection
@section('main')
    <!-- New User -->

    <div class="dashboard-box">
        <div class="dashboard-top">
            <div class="dashboard-title">ADD NEW USER</div>
        </div>
        <div class="dashboard-bottom">
            <h3 class="product-infomation">User infomation</h3>
            <form action="{{route('admin.user.postadd')}}" method="POST" class="product-form user-new">
                <div class="product-input">
                    <label for="user-email">Email</label>
                    <input type="email" placeholder="Enter Email Address" name="email" />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="user-name">Name</label>
                    <input type="text" placeholder="Enter User Name" name="username"  />
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="user-password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="product-input">
                    <label for="user-password">Comfirm Password</label>
                    <input type="password" placeholder="Enter Password" name="password_confirmation" />
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @csrf
                <div class="success-btns">
                    <div class="left">
                        <button class="user-new-reset" type="reset">Cancel</button>
                        <button type="submit" class="red-btn">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
