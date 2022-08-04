@extends('layouts.auth')
@section('title')
    Easy Fix - Sign-In
@endsection

@section('content')
    <div class="auth-section">
        @include('partials.alert')

        <div class="card shadow">
            <div class="card-header bg-white border-bottom-0">
                <img class="img-fluid logo me-2" src="{{asset('assets/images/logo.png')}}" alt="">
                <span class="logo-name align-middle">Easy Fix</span>
            </div>
            <div class="card-body">
                <form class="container" action="{{route('sign-in.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-mb-4">
                        <h4>Welcome Back!</h4>
                        <p class="text-muted">Sign in to continue.</p>
                    </div>
                    <div class="col-md mb-4">
                        <input type="email" class="form-control p-3" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md mb-4">
                        <input type="password" class="form-control p-3" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-4">
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="true">
                                <label class="form-check-label">
                                  Remember me
                                </label>
                            </div>
                            <a class="form-link" href="#">Forgot Password?</a>
                        </div>
                    </div>


                    <div class="col-md mb-4">
                        <button id="formButton" class="btn btn-success p-2 shadow">Sign In</button>
                    </div>

                    <div class="col-md">
                        <div class="d-flex justify-content-center h6">
                            <p>Don't have an account?</p>
                            <a class="form-link ms-2" href="{{route('register.index')}}">Register Now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
