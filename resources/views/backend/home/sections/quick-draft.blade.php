<div class="card">
    <div class="card-header">
        <h2>查看故障
            <small>故障列表</small>
        </h2>

        <br>

        @include('shared.errors')

        @include('shared.success')

        <form class="keyboard-save" role="form" method="POST" id="postCreate" action="{{ route('admin.post.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('backend.home.partials.form')

            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
            </div>
        </form>
    </div>
</div>