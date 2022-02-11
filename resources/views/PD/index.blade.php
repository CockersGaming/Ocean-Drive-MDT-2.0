@extends('layouts.app')

@section('styles')
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <style>
        #example3_length, #example3_info, #example3_filter {
            color: white;
        }

        #example3_filter, #example3_length {
            display: none;
        }
    </style>
    <meta name="_token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h1 class="mb-3">Active Warrants</h1>
                    <h2 class="text-black mb-2 font-w600">5</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h1 class="mb-3">Reports This Week</h1>
                    <h2 class="text-black mb-2 font-w600">28</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h1 class="mb-3">Active Units</h1>
                    <h2 class="text-black mb-2 font-w600">10</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h1 class="mb-3">Active EMS</h1>
                    <h2 class="text-black mb-2 font-w600">2</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-sm-12 m-t35">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lookup</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#person"><i class="la la-user mr-2"></i> Person</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#car"><i class="la la-car mr-2"></i> Car</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="person" role="tabpanel">
                                <div class="row">
                                    <div class="input-group search-area right d-lg-inline-flex d-none m-5 w-100">
                                        <input id="searchPed" name="searchPed" type="text" class="form-control" style="color: black !important;" placeholder="Search for a Person..."  data-toggle="tooltip" data-placement="top" title="Press the Enter key to search">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card" style="box-shadow: none !important;">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table header-border table-hover verticle-middle" id="ped">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Citizen ID</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="car">
                                <div class="row">
                                    <div class="input-group search-area right d-lg-inline-flex d-none m-5 w-100">
                                        <input id="searchCar" name="searchCar" type="text" class="form-control" style="color: black !important;" placeholder="Search for a Car..." data-toggle="tooltip" data-placement="top" title="Press the Enter key to search">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table header-border table-hover verticle-middle" id="car">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Plate</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12 m-t35">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bulletin</h4>
                    <a class="float-left btn btn-info text-white"> View More</a>
                </div>
                <div class="card-body">
                    <div class="basic-list-group">
                        <div class="list-group">
                            <a href="javascript:void()" class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-3 text-white">List group item heading</h5><small>3 days
                                        ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small>Donec id elit non mi
                                    porta.</small>
                            </a>
                            <a href="javascript:void()" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-3">List group item heading</h5><small class="text-muted">3
                                        days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small class="text-muted">Donec
                                    id elit non mi porta.</small>
                            </a>
                            <a href="javascript:void()" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-3">List group item heading</h5><small class="text-muted">3
                                        days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small class="text-muted">Donec
                                    id elit non mi porta.</small>
                            </a>
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

    <script type="text/javascript">
        $('#searchPed').on('keypress',function(event) {
            var keycode = (event.keycode ? event.keycode : event.which);
            if (keycode == '13') { // check if enter key is pressed to search ped
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('search.ped')}}',
                    data: {'search': $value},
                    success: function (data) {
                        $('#ped tbody').html(data);
                    }
                });
            }
        })

        $('#searchCar').on('keypress',function(event) {
            var keycode = (event.keycode ? event.keycode : event.which);
            if (keycode == '13') { // check if enter key is pressed to search car
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('search.car')}}',
                    data: {'search': $value},
                    success: function (data) {
                        $('#car tbody').html(data);
                    }
                });
            }
        })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@stop
