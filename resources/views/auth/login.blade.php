@extends('auth.master')
@section('title', 'Sigin')
@section('content')
    <div class="container" style="margin-top: 135px;">
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <section>
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            placeholder="Enter a valid email address" />
                            <label class="form-label" for="email">Email address</label>
                        </div>
                            @error('email')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter password" />
                            <label class="form-label" for="password">Password</label>
                        </div>
                            @error('password')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                        <div class="text-center text-lg-start my-4 pt-2">
                            <button class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                <a href="{{ route('register') }}" class="link-danger">Register</a></p>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <div
                class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                <!-- Copyright -->
                <!-- <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
                </div> -->
            </div>
        </section>
        
    </div>
@endsection
