@extends('backend.layout')


@section('title')
    <title>报故障系统</title>
@stop

@section('content')
    <script src="{{ asset('assets/js/echarts.common.min.js') }}"></script>
    <section id="main">
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                       @include('backend.statistics.tubiao')
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop
