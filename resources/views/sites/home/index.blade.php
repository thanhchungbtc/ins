
@extends('sites.layout')

@section('content')

    @include('sites.home.partials._slider')
    @include('sites.home.partials._about')
    {{--@include('sites.home.partials._steps')--}}
    @include('sites.home.partials._portfolio')
    @include('sites.home.partials._testimonial')

@stop






