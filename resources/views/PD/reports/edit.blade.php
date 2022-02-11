@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        {!! Form::open(['method' => 'POST', 'route' => ['reports.update', $report->id], 'class' => 'form-valide']) !!}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('name', $ped->fullname(), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="title">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::text('title', $report->title, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly' => '']) !!}
                                    </div>
                                    @if($errors->has('title'))
                                        <p class="help-block">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="description">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::textarea('description', $report->description, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'rows' => '10']) !!}
                                    </div>
                                    @if($errors->has('description'))
                                        <p class="help-block">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="charges">Charges
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {!! Form::select('charges[]', $charges->pluck('name', 'id'), old('charges') ? old('charges') : $report->charges, ['class' => 'form-control', 'multiple' => 'multiple', 'size' => 10, 'id' => 'charges']) !!}
                                    </div>
                                    @if($errors->has('charges'))
                                        <p class="help-block">
                                            {{ $errors->first('charges') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto text-white">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('characters.show', $report->ped_id) }}" class="btn btn-danger">back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1"></div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 h-50">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-12">
                            <h4>Jail Time - <span id="jailTime">{{$report->jail_time}}</span> months</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Fine - $<span id="fine">0</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>

        $(window).on('load', function () {
            getInfo($('#charges'))
        })

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
