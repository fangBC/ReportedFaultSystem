
<hr>
<h2>已完成</h2>
<hr>
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>用户名</th>
                <th class="col-md-1">房间</th>
                <th>故障类型</th>
                <th class="col-md-3">故障详情</th>
                <th>图片</th>
                <th class="col-md-2">时间</th>
                <th>处理人</th>
                <th>状态</th>
                {{--<td>受理</td>--}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
                @if ($data['finish'] == 1)
                <tr>
                    <td>{{ $data['user'] }}</td>
                    <td>{{ $data['room'] }}</td>
                    <td>{{ $data['type'] }} - {{ $data['type2'] }}</td>
                    <td>{{ $data['description'] }}@if(!empty($data['feedback']))<br/>反馈说明： <span style="color: red;">{{ $data['feedback'] }}</span>@endif</td>
                    <td>@if(strlen($data['img'])>5)<img src="{{ asset('uploads')}}/{{ $data['img'] }}" style="width: 20px;height: 20px;" data-action="zoom">@else 无@endif</td>
                    <td>{{ $data['time'] }}</td>
                    <td>@if ($data['user_cancel'] ==1){{ "用户自行取消" }}@else{{ $data['person'] }}@endif</td>
                    <td>已完成</td>
                    {{--<td><button type="button" class="btn btn-success btn-sm"  >受理</button></td>--}}
                </tr>
                @endif
             @endforeach


        </tbody>
    </table>
</div>
