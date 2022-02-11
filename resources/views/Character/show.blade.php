@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 col-xxl-8">
            <div class="row" style="height: 100% !important;">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h3>Personal Detail's</h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-white">
                                <div class="col-md-6 col-sm-12 p-3 text-center">
                                    <h3><b>Name</b> - {{ $char->fullname() }}</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 p-3 text-center">
                                    <h3><b>Citizen ID</b> - {{$char->citizenid}}</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 p-3 text-center">
                                    <h3><b>DOB</b> - {{$char->dob()}}</h3>
                                </div>
                                <div class="col-md-6 col-sm-12 p-3 text-center">
                                    <h3><b>Gender</b> - @if($char->gender() == 0)Male @else Female @endif</h3>
                                </div>
                            </div>
                            @if($char->backstory() != "placeholder backstory")
                                <div class="row text-white">
                                    <div class="col-md-12 col-sm-12 p-3 text-center">
                                        <h3><b>Back Story</b> - {{$char->backstory()}}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>License's</h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-white">
                                <div class="col-md-12 col-sm-12 p-3 text-center">
                                    <h3><b>Drivers Licence</b><br> @if($char->metaDataDriverLicence()) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i> @endif</h3>
                                </div>
                                <div class="col-md-12 col-sm-12 p-3 text-center">
                                    <h3><b>Business Licence</b><br> @if($char->metaDataBusinessLicence()) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i> @endif</h3>
                                </div>
                                <div class="col-md-12 col-sm-12 p-3 text-center">
                                    <h3><b>Weapons Licence</b><br> @if($char->metaDataWeaponLicence()) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i> @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="mb-0 text-black fs-20">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="my-profile">
                                    <img src="{{ $char->mugshot }}" alt="" class="rounded">
                                    <a type="button" data-toggle="modal" data-target="#mugshot">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <h4 class="mt-3 font-w600 text-black mb-0 name-text">{{$char->fullname()}}</h4>
                                <span>CID: {{ $char->citizenid }}</span>
                                <div class="row text-white">
                                    <div class="col-md-6 col-sm-12 p-3 text-center">
                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#report-create">Create Report</button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 p-3 text-center">
                                        <button class="btn btn-secondary mb-2" data-toggle="modal" data-target="#warrant-create">Create Warrant</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reports</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name/Plate</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($charReps as $cR)
                                <tr>
                                    <td>{{$cR->id}}</td>
                                    <td>{{$cR->title}}</td>
                                    <td>
                                        <a href="{{route('reports.edit', $cR->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('reports.show', $cR->id)}}" class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                        @if(Auth::user()->hasRole([1]))
                                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');", 'route' => ['reports.destroy', $cR->id])) !!}
                                            <button class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3>Warrants</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name/Plate</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($charWars as $cW)
                                <tr>
                                    <td>{{$cW->id}}</td>
                                    <td>{{$cW->name ?? $cW->plate}}</td>
                                    <td>
                                        <a href="{{route('warrants.edit', $cW->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('warrants.show', $cW->id)}}" class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                        @if(Auth::user()->hasRole([1]))
                                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');", 'route' => ['warrants.destroy', $cW->id])) !!}
                                            <button class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        @endif
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
    {{--  Modals  --}}
    {{--  Create Report Modal  --}}
    <div id="report-create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 70vw !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create A Report</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => ['reports.store'], 'class' => 'form-valid']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" id="pedid" name="pedid" value="{{$char->id}}" readonly hidden placeholder="Enter a name..">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$char->fullname()}}" readonly placeholder="Enter a name..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter a Title for the report..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="description">Description<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea rows="8" type="text" class="form-control" id="description" name="description" placeholder="Enter a Description of the incident.."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="charges">Charges<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        {{ Form::select('charges[]', $charges, old('charges'), ['class' => 'form-control', 'multiple' => 'multiple', 'size' => 10, 'id' => 'charges']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="author" name="author" readonly hidden value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 h-50">
                                <div class="row pb-2">
                                    <div class="col-12">
                                        <h4><b>Jail Time - <span id="jailTime">0</span> months</b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                       <h4> <b>Fine - $<span id="fine">0</span></b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Create</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--  Create Warrant Modal  --}}
    <div id="warrant-create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 70vw !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create A Warrant</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => ['warrants.store'], 'class' => 'form-valid']) !!}
                    <div class="modal-body">
                        <input type="text" class="form-control" id="pedid" name="pedid" value="{{$char->id}}" readonly hidden placeholder="Enter a name..">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Name<span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{$char->fullname()}}" readonly placeholder="Enter a name..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="reports">Link a report to this warrant</label>
                            <div class="col-lg-6">
                                {{ Form::select('reports[]', $reports, old('reports'), ['multiple' => 'multiple', 'class' => 'form-control', 'id' => 'reports']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="expireDate">When will the warrant stop<span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                {{ Form::date('expireDate', old('expireDate'), ['class' => 'form-control', 'id' => 'expireDate']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="notes">Add notes</label>
                            <div class="col-lg-6">
                                {{ Form::textarea('notes', old('expireDate'), ['class' => 'form-control', 'id' => 'expireDate']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="author" name="author" readonly hidden value="{{ Auth::user()->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Create</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--  Mug Shot Modal  --}}
    <div id="mugshot" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 70vw !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Mug Shot</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                {!! Form::open(['method' => 'PUT', 'route' => ['characters.update', $char->id], 'class' => 'form-valid']) !!}
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="mugshot" name="mugshot" @if($char->mugshot != null) value="{{$char->mugshot}}" @endif placeholder="Paste a url of the mugshot...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
    <script>

        $('#charges').change(function() {
            getInfo($(this))
        })

        function getInfo(elm) {
            let selected = []
            let jailTime = 0
            let fine = 0;

            elm.find(":selected").each(function (i) {
                selected[i] = $(this).val();
            })

            $.ajax({
                type: 'get',
                url: '{{ route('charge.data') }}',
                success: function (response) {
                    $.each(selected, function (selI, selV) {
                        $.each(response.success, function (i,v) {
                            if(parseInt(selV) === parseInt(v["id"])) {
                                jailTime += parseInt(v["jailTime"])
                                fine += parseInt(v["chargeAmount"])
                            }
                        })
                    })

                    $('#jailTime').text(jailTime)
                    $('#fine').text(fine)
                },
                error: function (response) {
                    // alert('Error'+ response);
                }
            });
        }
    </script>
@stop
