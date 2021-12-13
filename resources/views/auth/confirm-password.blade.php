@extends('layouts.auth-app')
@section('title', 'Forgot Password')
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
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="form-group">
                                    <label><strong>Confirm Password</strong></label>
                                    <input type="password" class="form-control" value="password">
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
