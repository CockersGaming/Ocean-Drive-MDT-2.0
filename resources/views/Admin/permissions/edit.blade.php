@extends('layouts.app')
@section('title', 'Create Permission')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['permissions.update', $permission->id], 'class' => 'form-valide']) !!}
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
                                        {!! Form::text('name', $permission->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    </div>
                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto text-white">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{route('permissions.index')}}" class="btn btn-danger">back</a>
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
