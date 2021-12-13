@extends('layouts.app')

@section('content')
    @can('PD')
        @include('PD.index')
    @elsecan('EMS')
        @include('EMS.index')
    @elsecan('DOJ')
        @include('DOJ.index')
    @else
        <h1>An error has occurred. Contact "Cockers Gaming#8346" in Discord</h1>
    @endcan
@stop
