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
                    <div class=".col-md-6 .col-md-offset-3">
                       @include('backend.repository.content')
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop
