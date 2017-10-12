<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/zooming.js') }}"></script>

<script>
    function cancel(id)
    {
        $.ajax({
            url: "{{ route('home/cancel') }}"+"?id="+id,
            data: "",
            type: "get",
            success: function (msg) {
//                console.log(msg);
                location.reload();
            },
            error: function (XMLHttpRequest, ajaxOptions, thrownError) {
//                    console.log(XMLHttpRequest+"          "+ ajaxOptions+"     "+thrownError);
                alert("提交失败");
            }
        });
    }
</script>


<h2>正在受理</h2>
<hr>
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-md-1">房间</th>
                <th class="col-md-2">故障类型</th>
                <th class="col-md-3">故障详情</th>
                <th>图片</th>
                <th class="col-md-2">时间</th>
                <th>处理人</th>
                <th>状态</th>
                <th>撤销</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $data)
            @if ($data['finish'] == 0 )
                <tr>
                    {{--<input type="hidden"  name="id">--}}
                    <td>{{ $data['room'] }}</td>
                    <td>{{ $data['type'] }}</td>
                    <td>{{ $data['description'] }}</td>
                    <td>@if(strlen($data['img'])>5)<img src="{{ asset('uploads')}}/{{ $data['img'] }}" style="width: 20px;height: 20px;" data-action="zoom">@else 无@endif</td>
                    <td>{{ $data['time'] }}</td>
                    <td>{{ $data['person'] }}</td>
                    <td>@if ($data['status'] == 0) 无人受理 @elseif ($data['status'] == 1) 正在处理中 @endif</td>
                    <td><button type="button" class="btn btn-warning btn-sm"  onclick="cancel($(this).val())" value="{{ $data['id'] }}">撤销</button></td>
                    {{--<td><button type="button" class="btn btn-warning btn-sm" value="{{ $data['id'] }}" onclick="user_id($(this).val())" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">撤销</button></td>--}}
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

