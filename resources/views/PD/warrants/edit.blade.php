@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['warrants.update', $warrant->id], 'class' => 'form-valide']) !!}
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" id="pedid" name="pedid" value="{{$warrant->ped_id}}" readonly hidden placeholder="Enter a name..">
                        @if($warrant->name)
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="name">Name</label>
                                <div class="col-lg-6">
                                    {!! Form::text('name', $warrant->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly' => '']) !!}
                                </div>
                            </div>
                        @elseif($warrant->plate)
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="plate">Plate</label>
                                <div class="col-lg-6">
                                    {!! Form::text('plate', $warrant->plate, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly' => '']) !!}
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="plate">Link a report to this warrant</label>
                            <div class="col-lg-6">
                                {!! Form::select('reports[]', $reports, old('reports') ? old('reports') : $warrant->report_id, ['class' => 'form-control', 'multiple' => 'multiple', 'size' => 10]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="expireDate">When will the warrant stop</label>
                            <div class="col-lg-6">
                                {{ Form::date('expireDate', $warrant->expire, ['class' => 'form-control', 'id' => 'expireDate']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="notes">Add additional info</label>
                            <div class="col-lg-6">
                                {{ Form::textarea('notes', $warrant->notes, ['class' => 'form-control', 'id' => 'expireDate']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto text-white">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('warrants.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
