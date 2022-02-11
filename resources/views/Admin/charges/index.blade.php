@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Charges</h4>
                    <div class="float-left">
                        <a href="{{route('charges.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Charge Amount</th>
                                    <th scope="col">Jail Time (Months)</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Extra Info</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($charges as $c)
                                    <tr>
                                        <th>
                                            {{$c->id}}
                                        </th>
                                        <td>
                                            {{$c->name}}
                                        </td>
                                        <td>
                                            ${{$c->chargeAmount}}
                                        </td>
                                        <td>
                                            {{$c->jailTime}}
                                        </td>
                                        <td>
                                            {{$c->description}}
                                        </td>
                                        <td>
                                            {{$c->extra}}
                                        </td>
                                        <td>
                                            @foreach($cats as $cat)
                                                @if($c->category_id === $cat->id)
                                                    {{$cat->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('charges.edit', $c->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');", 'route' => ['charges.destroy', $c->id])) !!}
                                                <button class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
