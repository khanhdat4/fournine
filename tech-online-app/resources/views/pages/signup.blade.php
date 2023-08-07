@extends('master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection
@section('title')
    Sign up
@endsection
@section('main')
<main id="main">
    <section class="userForm background">
      <div class="img">
        <img src="{{asset('images/login.PNG')}}" alt="" />
      </div>
      <div class="container">
        <div class="userForm-form">
          <h2 class="form-title">Create an account</h2>
          <p class="form-desc">Enter your details below</p>
          <form method="POST" action="{{ route('register.perform') }}">
            <div class="form-input">
              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email"
              />
              @if ($errors->has('email'))
                <span class="text-danger text-left px-3 pb-1">{{ $errors->first('email') }}</span>
            @endif
            </div>
            <div class="form-input">
              <input
                type="text"
                name="username"
                value="{{ old('username') }}"
                placeholder="Username"
              />
              @if ($errors->has('username'))
                <span class="text-danger text-left px-3 pb-1">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-input">
              <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
              @if ($errors->has('password'))
                <span class="text-danger text-left px-3 pb-1">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-input">
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" />
                @if ($errors->has('password_confirmation'))
                  <span class="text-danger text-left px-3 pb-1">{{ $errors->first('password_confirmation') }}</span>
                  @endif
              </div>

            @csrf

            <button type="submit" class="form-btn signup">Sign up</button>

            <p class="form-already">
              Already have account? <a href="{{route("login.show")}}">Log in</a>
            </p>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
