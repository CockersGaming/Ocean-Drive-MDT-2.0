@extends('layouts.app')
@section('title', 'Create Role')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['roles.update', $role->id], 'class' => 'form-valide']) !!}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    </div>
                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Permissions
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control', 'multiple' => 'multiple', 'size' => 10]) !!}
                                    </div>
                                    @if($errors->has('permission'))
                                        <p class="help-block">
                                            {{ $errors->first('permission') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto text-white">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
