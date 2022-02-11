@extends('layouts.app')
@section('title', 'Edit '.$user->name)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id], 'class' => 'form-valide']) !!}
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" placeholder="Enter a Name..">
                                        </div>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="username">Username
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="username" value="{{$user->username}}" name="username" placeholder="Enter a Username..">
                                        </div>
                                        @if($errors->has('username'))
                                            <p class="help-block">
                                                {{ $errors->first('username') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="username">Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="hello@example.com">
                                        </div>
                                        @if($errors->has('email'))
                                            <p class="help-block">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="password">Password
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        @if($errors->has('password'))
                                            <p class="help-block">
                                                {{ $errors->first('password') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="role">Assign a Role or Roles<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            {!! Form::select('roles', $roles, old('roles') ? old('role') : $user->roles()->pluck('name', 'name'), ['class' => 'custom-select', 'required' => '', 'multiple' => 'multiple', 'size' => 10]), '' !!}
                                        </div>
                                        @if($errors->has('role'))
                                            <p class="help-block">
                                                {{ $errors->first('role') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto text-white">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="{{route('roles.index')}}" class="btn btn-danger">back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3"></div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
