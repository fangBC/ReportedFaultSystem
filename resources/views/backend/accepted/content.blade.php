<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/zooming.js') }}"></script>
<script>

    $(function()
    {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
        })
    })

    function user_id(name)
    {
        $("#update").click(function(){
            var content = $("#recipient-name").val();
            var text = $("#message-text").val();
            $.ajax({
                url: "{{ route('admin/cancel') }}"+"?id="+name+"&content="+content+"&text="+text,
                data: "",
                type: "get",
                success: function (msg) {
//                    console.log(msg);
                    location.reload();
                },
                error: function (XMLHttpRequest, ajaxOptions, thrownError) {
                    alert("提交失败");
                }
            });
        })
    }

    function finish(id)
    {
        $.ajax({
            url: "{{ route('accept/finish') }}"+"?id="+id,
            data: "",
            type: "get",
            success: function (msg) {
                location.reload();
            },
            error: function (XMLHttpRequest, ajaxOptions, thrownError) {
                alert("提交失败");
            }
        });
    }

    function feedBack(name)
    {
        $("#feed").click(function(){
            var content = $("#feedback").val();
            $.ajax({
                url: "{{ route('feedback') }}",
                data: "feed="+content+"&id="+name,
                type: "post",
                success: function (msg) {
//                    console.log(msg);
                    location.reload();
                },
                error: function (XMLHttpRequest, ajaxOptions, thrownError) {
                    alert("提交失败");
                }
            });
        })
    }
</script>

<h2>正在受理</h2>
<hr>
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>用户名</th>
                <th class="col-md-1">房间</th>
                <th class="col-md-2">故障类型</th>
                <th class="col-md-3">故障详情</th>
                <th>图片</th>
                <th class="col-md-2">时间</th>
                <th>处理人</th>
                <th>状态</th>
                {{--<th>撤销</th>--}}
            </tr>
        </thead>
        <?php $array = $data ?>
        @foreach ($data as $row)
            @if ($row['finish'] == 0 and $row['status'] == 1 )
        <tr>
            <!-- <input type="hidden"  name="id"> -->
            <td>{{ $row['user'] }}</td>
            <td>{{ $row['room'] }}</td>
            <td>{{ $row['type'] }} - {{ $row['type2'] }}</td>
            {{--<td>{{ $row['description'] }}@if(!empty($row['feedback']))<br/>反馈说明： <span style="color: red;">{{ $row['feedback'] }}</span>@endif</td>--}}
            <td style="width:20px;height: 20px"><a href="#" data-toggle="modal" data-target="#exampleModal{{ $row['id'] }}" data-whatever="@mdo"><span title="{{ $row['description'] }}">{{ $row['description'] }}</span></a> @include('backend.home.partials.details', ['id' =>  $row['id'] ,'data' => json_encode($row)])@if(!empty($row['feedback']))<br/>反馈说明： <span style="color: red;">{{ $row['feedback'] }}</span>@endif</td>
            <td>@if(strlen($row['img']) > 5)<img src="{{ asset('uploads')}}/{{ $row['img'] }}" style="width: 20px;height: 20px;" data-action="zoom">@else 无@endif</td>
            <td>{{ $row['time'] }}</td>
            <td>{{ $row['person'] }}</td>
            <td>故障跟进中</td>
            <td><button type="button" class="btn btn-success btn-sm"  onclick="finish($(this).val())" value="{{ $row['id'] }}">完成</button></td>
            <td><button type="button" class="btn btn-warning btn-sm" value="{{ $row['id'] }}" onclick="user_id($(this).val())" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">撤销</button></td>
            <td><button type="button" class="btn btn-warning btn-sm" value="{{ $row['id'] }}" onclick="feedBack($(this).val())" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">反馈</button></td>
        </tr>
            @endif
        @endforeach

    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">撤销说明</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">故障内容</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">详细描述</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="update">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">反馈详情</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="control-label">详细描述</label>
                        <textarea class="form-control" id="feedback"></textarea>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="feed">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>



