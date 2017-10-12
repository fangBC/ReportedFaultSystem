
<div class="card">
    <div class="card-header" >
        <h2>故障列表</h2>

        <br>

@include('shared.errors')

@include('shared.success')

{{--<form class="keyboard-save" role="form" method="POST" id="postCreate" action="">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

    @include('backend.home.partials.form')

    <br>

    <div class="form-group">
        {{--<button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> 批量受理</button>--}}
    </div>
{{--</form>--}}
</div>
</div>