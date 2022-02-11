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
                    <h4 class="card-title">Reports</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display text-white" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Jail Time</th>
                                    <th>Fine</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $r)
                                    <tr>
                                        <td>{{$r->id}}</td>
                                        <td>{{$r->character()->fullname()}}</td>
                                        <td>{{$r->title}}</td>
                                        <td>{{$r->author()->fullname()}}</td>
                                        <td>{{$r->jail_time}}</td>
                                        <td>{{$r->charge_amount}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('reports.edit', $r->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                @if(Auth::user()->hasRole([1]))
                                                    <a href="{{route('reports.destroy', $r->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
