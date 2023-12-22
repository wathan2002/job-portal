@extends('auth.master')
@section('title', 'Sigin')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h5>Sign In</h5>
                <div class="card border border-primary">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body bg-secondary">
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email" placeholder="Email" class="form-control mb-2 @error('email') is-invalid @enderror">
                            </div>
                              @error('email')
                                <small class="invalid-feedback">{{$message}}</small>
                              @enderror
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" placeholder="Password" class="form-control mb-2 @error('password') is-invalid @enderror">
                            </div>
                             @error('password')
                                <small class="invalid-feedback">{{$message}}</small>
                             @enderror
                            <div>
                                <button class="btn btn-sm btn-primary">Sign in</button>
                            </div>
                        </div>
                        <div class="card-footer bg-info">
                            You have no account yet? <a href="{{ route('register')}} ">Sign Up</a> here
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
