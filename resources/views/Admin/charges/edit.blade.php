@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['charges.update', $charge->id], 'class' => 'form-valide']) !!}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-xl-8">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('name', $charge->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                                        {!! Form::text('chargeAmount', $charge->chargeAmount, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                                        {!! Form::text('jailTime', $charge->jailTime, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    </div>
                                    @if($errors->has('jailTime'))
                                        <p class="help-block">
                                            {{ $errors->first('jailTime') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="description">Charge Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('description', $charge->description, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    </div>
                                    @if($errors->has('description'))
                                        <p class="help-block">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="extra">Charge Extra Info
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('extra', $charge->extra, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    </div>
                                    @if($errors->has('extra'))
                                        <p class="help-block">
                                            {{ $errors->first('extra') }}
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
