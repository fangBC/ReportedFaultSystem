
<div class="card">
    <div class="card-header">
        <h2>报故障</h2>
        <hr>
        <br>

        @include('shared.errors')

        @include('shared.success')

        <form class="keyboard-save" role="form" method="POST" id="postCreate" action="{{ route('hitch/create') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('home.reported.form')

            <br>


        </form>
    </div>
</div>