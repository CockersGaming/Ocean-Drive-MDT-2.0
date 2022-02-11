@extends('layouts.app')
@section('title', 'Create Permission')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['roles.store'], 'class' => 'form-valide']) !!}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name..">
                                    </div>
                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="roles">Assign to a Role or Roles <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                                    </div>
                                    @if($errors->has('permission'))
                                        <p class="help-block">
                                            {{ $errors->first('permission') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto text-white">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
