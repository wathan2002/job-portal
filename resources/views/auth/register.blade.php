@extends('auth.master')
@section('title', 'Signup')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h5>Sign Up</h5>
                <div class="card">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="card-body bg-secondary">
                            <div>
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" placeholder="Name" class="form-control mb-2 @error('name') is-invalid @enderror">
                            </div>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email" placeholder="Email" class="form-control mb-2 @error('email') is-invalid @enderror">
                            </div>
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" placeholder="Password" class="form-control mb-2 @error('password') is-invalid @enderror">
                            </div>
                            @error('password')
                                <small class="text-danger">{{$message}}</small>
                            @enderror

                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="employee" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Employee
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="employer">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Employer
                                    </label>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary">Sign up</button>
                            </div>
                        </div>
                        <div class="card-footer bg-info">
                            Already have an account? <a href="{{ route('login') }}">Sign In</a> here
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
