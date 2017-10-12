

<hr>
<h2>已完成</h2>
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
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $data)
            @if ($data['finish'] == 1 )
                <tr>
                    <td>{{ $data['room'] }}</td>
                    <td>{{ $data['type'] }}</td>
                    <td>{{ $data['description'] }}</td>
                    <td>@if(strlen($data['img'])>5)<img src="{{ asset('uploads')}}/{{ $data['img'] }}" style="width: 20px;height: 20px;" data-action="zoom">@else 无@endif</td>
                    <td>{{ $data['time'] }}</td>
                    <td>{{ $data['person'] }}</td>
                    <td>处理完成</td>
                </tr>
            @endif
        @endforeach
             


        </tbody>
    </table>
</div>
