@extends('master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pageNotFound.css') }}">
@endsection
@section('main')
    <main id="main">
        <section class="pageNotFound">
            <div class="container">
                <h2 class="pageNotFound-title">404 Not Found</h2>
                <span class="pageNotFound-desc">Your visited page not found. You may go home page.</span>
                <a href="{{route('home.index')}}" class="pageNotFound-btn red-btn">Back to home page</a>
            </div>
        </section>
    </main>
@endsection
