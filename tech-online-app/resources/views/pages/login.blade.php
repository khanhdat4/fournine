@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection
@section('title')
    Login
@endsection
@section('main')
    <main id="main">
        <section class="userForm background">
            <div class="img">
                <img src="{{ asset('images/login.PNG') }}" alt="" />
            </div>
            <div class="container">
                <div class="userForm-form">
                    <h2 class="form-title">Log in to Exclusive</h2>
                    <p class="form-desc">Enter your details below</p>
                    <form method="post" action="{{ route('login.perform') }}">
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-warning" role="alert">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-input">
                            <input type="text" name="username" value="{{ old('username') }}" aria-describedby="emailHelp"
                                placeholder="Enter your Email or Username" />
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-input">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        @csrf
                        <div class="form-btns">
                            <button type="submit" class="form-btn">Log in</button>
                            <a href="" class="form-forget">Forget Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
