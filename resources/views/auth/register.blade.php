@extends('layouts.auth-app')
@section('title', 'Register')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <img src="{{asset('images/logo.png')}}" alt="">
                            </div>
                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="mb-1"><strong>First Name</strong></label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $request->firstname }}" required  placeholder="Pixel">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Last Name</strong></label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $request->lastname }}" required  placeholder="Bun">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Username</strong></label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  placeholder="doopi">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $request->email }}" required  placeholder="example@email.com">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Confirm Password</strong></label>
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
