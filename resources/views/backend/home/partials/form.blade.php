
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/zooming.js') }}"></script>
<style>
    span{
        width: 10px;
        height: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        /*white-space: nowrap;*/
    }
</style>
<script>

    function selectAll(){
        if ($("input[name='checkbox-all']").attr("checked")) {
            $('input:checkbox').each(function() {
                $(this).attr('checked', false);
            });
        } else {
            $('input:checkbox').each(function() {
                $(this).attr('checked', true);
            });
        }
    }

    function user_id(name){
        $.ajax({
            url: "{{ route('admin/post') }}"+"?id="+name,
            data: "id="+name,
            type: "get",
            success: function (msg) {
                location.reload();
            },
            error: function () {
                alert("提交失败");
            }
        });
    }


</script>

<div >
    <table class="table table-hover">
        
        <thead>
            <tr>
                {{--<td><input type="checkbox" name="checkbox-all" onclick="selectAll()">全选择</td>--}}
                <th>用户名</th>
                <th class="col-md-1">房间</th>
                <th>故障类型</th>
                <th class="col-md-3">故障详情</th>
                 <th>图片</th>
                <th>处理人</th>
                <th class="col-md-2">时间</th>
                <th>状态</th>
                <th>受理</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
            @if ($row['finish'] != 1)
            <tr @if ( $row['is_cancel'] == 1) style="background-color: #ffb5b5" @endif>
                <input type="hidden" name="id" value="{{ $row['id'] }}">
                <td>{{ $row['user'] }}</td>
                <td>{{ $row['room'] }}</td>
                <td>{{ $row['type'] }} - {{ $row['type2'] }}</td>
                <td style="width:20px;height: 20px"><a href="#" data-toggle="modal" data-target="#exampleModal{{ $row['id'] }}" data-whatever="@mdo"><span title="{{ $row['description'] }}">{{ $row['description'] }}</span></a> @include('backend.home.partials.details', ['id' =>  $row['id'] ,'data' => json_encode($row)])</td>
                <td>@if(strlen($row['img'])>5)<img src="{{ asset('uploads')}}/{{ $row['img'] }}" style="width: 20px;height: 20px;" data-action="zoom">@else 无@endif</td>
                <td>{{ $row['person'] }}</td>
                <td>{{ $row['time'] }}</td>
                <td> @if ($row['status'] == 0)  待处理 </td>
                <td ><button type="button" class="btn btn-success btn-sm" onclick="user_id($(this).parents('tr').find('input').val())" >受理</button></td>
                     @else 正在处理  </td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="user_id($(this).parents('tr').find('input').val())"  disabled>正在处理</button></td>
                @endif
            </tr>
            @endif
        @endforeach

        </tbody>
    </table>
</div>


