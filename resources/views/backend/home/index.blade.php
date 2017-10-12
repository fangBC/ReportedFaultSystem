@extends('backend.layout')

@section('title')
    <title>报故障系统</title>
@stop

@section('content')
    <section id="main">
        <section id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        @include('backend.home.sections.check-hitch')
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
