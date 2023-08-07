@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@endsection
@section('title')
    My Account
@endsection
@section('main')
    <main id="main">
        <section class="account">
            <div class="container d-flex">
                <div class="left-account">
                    <nav aria-label="breadcrumb">
                    <aside class="sidebar">
                            <h3 class="menu-heading mb-2"><a class="text-danger" href="{{route('user.show')}}">Manage My Account</a></h3>

                            <h3 class="menu-heading mb-2"><a href="{{route('user.order')}}">My Orders</a></h3>
                    </aside>
                </div>
                <div class="right-account">
                    <div class="right-box">
                        <h2 class="right-heading">Edit Your Profile</h2>
                        <form class="row g-3 mt-1" action="{{ route('user.update') }}" method="Post">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="fname" class="form-control" id="inputFirstName"
                                    value="{{ $user->fname }}" placeholder="White"/>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" name="lname" class="form-control" id="inputLastName" value="{{ $user->lname }}" placeholder="Lotus"/>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="address"
                                    placeholder="Kingston, 5236, United State"
                                    value="{{ $user->address }}" />
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Password Changes</label>
                                <input type="password" name="password" class="form-control" id="inputPassword4"
                                    placeholder="Current Passwod" />
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <input type="password" name="new_password" class="form-control" id="inputPassword4"
                                    placeholder="New Passwod" />
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="password" name="confirm_new_password" class="form-control" id="inputPassword4"
                                    placeholder="Confirm New Passwod" />
                                @error('confirm_new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @csrf
                            <div class="spacing col-12 d-flex justify-content-end">
                                <button>Cancel</button>
                                <button type="submit" class="right-btn">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
