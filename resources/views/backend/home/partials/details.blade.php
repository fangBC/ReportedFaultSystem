

<div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
            $data = (array) json_decode($data);
            $bb = $data;
            $array = array();
            foreach ($data as $k => $v){
                if ($k == 'cancel' ){
                    $array = (array) $data[$k];
                }
            }
            ?>

            @if ($data['is_cancel'] == 1)

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">故障详情</h4>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">故障类型</label>
                                <h3>{{ $data['type'] }} - {{ $data['type2'] }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">详细情况:</label>
                                <h3>{{ $data['description'] }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">图片:</label>
                                <h3>@if(strlen($data['img'])>5)<img  src="{{ asset('uploads')}}/{{ $data['img'] }}" style="width: 560px;height: 500px;" >@else 无@endif</h3>
                            </div>
                        <div id="imgtest"></div>

                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">撤销故障详情</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">故障内容</label>
                                <h3>{{ $array['type'] }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">详细情况:</label>
                                <h3>{{ $array['content'] }}</h3>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">故障详情</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">故障类型</label>
                                <h3>{{ $data['type'] }} - {{ $data['type2'] }}</h3>
                            </div> 
                            <div class="form-group">
                                <label for="message-text" class="control-label">详细情况:</label>
                                <h3>{{ $data['description'] }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">图片:</label>
                                <h3>@if(strlen($data['img'])>5)<img src="{{ asset('uploads')}}/{{ $data['img'] }}" style="width: 200px;height: 200px;">@else 无@endif</h3>
                            </div>
                            <div id="imgtest"></div>
                        </form>
                    </div>
                @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
