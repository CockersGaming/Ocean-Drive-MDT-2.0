@extends('layouts.app')

@section('styles')
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <style>
        #example3_length, #example3_info, #example3_filter {
            color: white;
        }
    </style>
@stop

@section('scripts')
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
@stop

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Warrants</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display text-white" style="min-width: 845px">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name/Plate</th>
                                <th>Author</th>
                                <th>Expire Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warrants as $w)
                                <tr>
                                    <td>{{$w->id}}</td>
                                    <td>{{$w->name ?? $w->plate}}</td>
                                    <td>{{$w->author()->fullname()}}</td>
                                    <td>{{$w->expire()}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('warrants.edit', $w->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            @if(Auth::user()->hasRole([1]))
                                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');", 'route' => ['warrants.destroy', $w->id])) !!}
                                                    <button class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endif
                                        </div>
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
