@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['reports.store'], 'class' => 'form-valide']) !!}
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Title of Report
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title">
                                        </div>
                                        @if($errors->has('title'))
                                            <p class="help-block">
                                                {{ $errors->first('title') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Title of Report
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            @dd($char)
                                            <input type="text" class="form-control" disabled value="{{$char->name}}">
                                            <input type="text" class="form-control" disabled hidden value="{{$char->id}}" id="ped_id" name="ped_id">
                                        </div>
                                        @if($errors->has('title'))
                                            <p class="help-block">
                                                {{ $errors->first('title') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto text-white">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{route('pd.index')}}" class="btn btn-danger">Back</a>
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
