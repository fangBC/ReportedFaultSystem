@extends('backend.layout')

@section('title')
    <title>报故障系统</title>
@stop

@section('content')
    <section id="main">
{{--        @include('backend.partials.sidebar-navigation')--}}
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class=".col-md-6 .col-md-offset-3">
                        @include('backend.register.content')
                    </div>

                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @if(Session::get('_login'))
        @include('backend.partials.notify', ['section' => '_login'])
        {{ \Session::forget('_login') }}
    @endif
    @include('backend.shared.components.slugify')
    {!! JsValidator::formRequest('App\Http\Requests\PostCreateRequest', '#postCreate') !!}
@stop
