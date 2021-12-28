@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Access Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $r)
                                <tr>
                                    <th>{{$r->id}}</th>
                                    <td>{{$r->email}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->department}}</td>
                                    <td>{{$r->role}}</td>
                                    <td>
                                        <a href="{{route('requests.accept', $r->id)}}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-check"></i></a>
                                        <a href="{{route('requests.reject', $r->id)}}" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-times"></i></a>
                                        {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');", 'route' => ['requests.destroy', $r->id])) !!}
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Accepted Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accepted as $a)
                                <tr>
                                    <th>{{$a->id}}</th>
                                    <td>{{$a->email}}</td>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->department}}</td>
                                    <td>{{$a->role}}</td>
                                    <td>
                                        <a href="{{route('requests.reject', $a->id)}}" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-times"></i></a>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rejected Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rejected as $rd)
                                <tr>
                                    <th>{{$rd->id}}</th>
                                    <td>{{$rd->email}}</td>
                                    <td>{{$rd->name}}</td>
                                    <td>{{$rd->department}}</td>
                                    <td>{{$rd->role}}</td>
                                    <td>
                                        <a href="{{route('requests.accept', $rd->id)}}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-check"></i></a>
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
