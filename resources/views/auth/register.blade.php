@extends('layouts.auth')
@section('title')
    Easy Fix - Sign-In
@endsection

@section('content')
    <div class="auth-section mt-2">
        @include('partials.alert')

        <div class="card shadow">
            <div class="card-header bg-white border-bottom-0">
                <img class="img-fluid logo me-2" src="{{asset('assets/images/logo.png')}}" alt="">
                <span class="logo-name align-middle">Easy Fix</span>
            </div>
            <div class="card-body">
                <form class="container" action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-mb-4">
                        <h4>Create New Account</h4>
                        <p class="text-muted">Register to create new account</p>
                    </div>

                    <div class="col-md mb-4">
                        <input type="text" class="form-control p-3" id="name" name="name" placeholder="Full Name *" value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-4">
                        <input type="email" class="form-control p-3" id="email" name="email" placeholder="Email Address * " value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md mb-4">
                        <input type="tel" class="form-control p-3" id="telephone" name="telephone" placeholder="Telephone No. *" value="{{ old('telephone') }}">
                        <span class="text-danger">@error('telephone'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-4">
                        <input type="" class="form-control p-3" id="password" name="password" placeholder="Password *" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-4">
                        <input type="" class="form-control p-3" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password *" value="{{ old('password_confirmation') }}">
                        <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-4">
                        <button id="formButton" class="btn btn-success p-2 shadow">Register</button>
                    </div>

                    <div class="col-md">
                        <div class="d-flex justify-content-center h6">
                            <p>Already a user?</p>
                            <a class="form-link ms-2" href="{{route('sign-in.index')}}">Sign-In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
