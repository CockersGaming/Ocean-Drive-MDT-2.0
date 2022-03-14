@extends('layouts.app')

@section('styles')
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <style>
        #example2_length, #example2_info, #example2_filter {
            color: white;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xl-8 col-sm-12 offset-xl-2">
            <div class="card">
                <div class="card-header">
                    <h3>Report ID: {{ $report->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <div class="row">
                                <div class="col-xl-3 col-sm-12 text-center">
                                    <h4>Title:</h4>
                                    <p>{{ $report->title }}</p>
                                </div>
                                <div class="col-xl-6 col-sm-12 text-center">
                                    <h4>Description:</h4>
                                    <p>{{ $report->description }}</p>
                                </div>
                                <div class="col-xl-3 col-sm-12 text-center">
                                    <h4>Reporting Officer:</h4>
                                    <p>{{ $report->author()->fullname() }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 text-center">
                                    <h5>Total Amount Charged:</h5>
                                    <p>${{ $report->charge_amount }}</p>
                                </div>
                                <div class="col-xl-6 col-sm-12 text-center">
                                    <h4>Total Jail Time:</h4>
                                    <p>{{ $report->jail_time }} months</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <h4>Charges:</h4>
                            <div class="table-responsive">
                                <table id="example2" class="display text-white">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Charge<br>Amount<br>($)</th>
                                            <th>Jail Time<br>(months)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($charges as $c)
                                        <tr>
                                            <td>{{ $c->id }}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->chargeAmount }}</td>
                                            <td>{{ $c->jailTime }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
@stop
