<h2>知识库</h2>
<div>
	<table class="table table-hover">
        <thead>
            <tr>
                <th class="col-md-1">序号</th>
                <th>故障类型</th>
                <th class="col-md-3">故障问题</th>
                <th>解决方法</th>
                <th class="col-md-2">创建时间</th>
                <th>创建人</th>
            </tr>
        </thead>
        <tbody>
        <?php $array = $data; ?>
        @foreach($data as $k => $v)
        	<tr>
        		<td>{{ $k+1 }}</td>
        		<td>{{ $v->type }}</td>
        		<td><a href="#"  data-toggle="modal" data-target="#exampleModal{{ $v->id }}" data-whatever="@mdo"><p style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 20em;'>{{ $v->title }}</p></a></td>
        		<td><p style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 20em;'>{{ $v->content }}</p></td>
        		<td>{{ $v->created_at }}</td>
        		<td>{{ $v->founder }}</td>
        	</tr>
            @endforeach

        </tbody>
    </table>
</div>
{{ $data->links() }}


@foreach($array as $array)
<div class="modal fade" id="exampleModal{{ $array->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">知识库</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <h3><label for="recipient-name" class="control-label">故障问题：</label></h3>
                        <h4>{{ $array->title }}</h4>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label"><h3>解决方法：</h3></label>
                        <h4><span>{{ $array->content }}</span></h4>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach