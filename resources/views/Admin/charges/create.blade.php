@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['charges.store'], 'class' => 'form-valide']) !!}
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::text('name',old('name'), ['class' => 'form-control', 'placeholder' => 'Enter a charge Name e.g. being called Kyle', 'required' => '']) !!}
                                        </div>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="chargeAmount">Charge Amount ($)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::text('chargeAmount', old('chargeAmount'), ['class' => 'form-control', 'placeholder' => '000', 'required' => '']) !!}
                                        </div>
                                        @if($errors->has('chargeAmount'))
                                            <p class="help-block">
                                                {{ $errors->first('chargeAmount') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="jailTime">Charge Jail Time (months)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::text('jailTime', old('jailTime'), ['class' => 'form-control', 'placeholder' => '0', 'required' => '']) !!}
                                        </div>
                                        @if($errors->has('jailTime'))
                                            <p class="help-block">
                                                {{ $errors->first('jailTime') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="description">Charge Description

                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::text('description', old('extra'), ['class' => 'form-control', 'placeholder' => 'Enter a charge description...']) !!}
                                        </div>
                                        @if($errors->has('description'))
                                            <p class="help-block">
                                                {{ $errors->first('description') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="extra">Charge Extra Info

                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::text('extra', old('extra'), ['class' => 'form-control', 'placeholder' => 'Enter extra info for this charge...']) !!}
                                        </div>
                                        @if($errors->has('extra'))
                                            <p class="help-block">
                                                {{ $errors->first('extra') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="category">Charge Category
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            {!! Form::select('category', $cats, old('category'), ['class' => 'form-control', 'required' => '']) !!}
                                        </div>
                                        @if($errors->has('category'))
                                            <p class="help-block">
                                                {{ $errors->first('category') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto text-white">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <a href="{{route('permissions.index')}}" class="btn btn-danger">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
