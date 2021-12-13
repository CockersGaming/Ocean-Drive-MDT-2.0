@extends('layouts.auth-app')
@section('title', 'Request Access')
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
                            <h4 class="text-center mb-4">Forgot Password</h4>
                            <form method="GET" action="{{ route('request.send') }}">
                                @csrf
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="hello@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong>Name</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  placeholder="Salty Lord">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong>Department</strong></label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required  placeholder="LSPD">
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong>Role</strong></label>
                                    <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required  placeholder="Officer">
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
